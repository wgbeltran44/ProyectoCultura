<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class EstadisticasController extends Controller
{
    /**
     * Mostrar dashboard de estadísticas
     */
    public function index()
    {
        // Datos para gráficas
        $obrasPorTipo = Obra::select('tipo', DB::raw('count(*) as total'))
            ->whereNotNull('tipo')
            ->groupBy('tipo')
            ->get();
        
        $obrasPorAutor = Obra::select('autor', DB::raw('count(*) as total'))
            ->whereNotNull('autor')
            ->where('autor', '!=', '')
            ->groupBy('autor')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
        
        $obrasPorFecha = Obra::select(
                DB::raw('YEAR(fecha) as año'),
                DB::raw('count(*) as total')
            )
            ->whereNotNull('fecha')
            ->groupBy('año')
            ->orderBy('año', 'asc')
            ->get();
        
        $obrasPorUsuario = Obra::select('user_id', DB::raw('count(*) as total'))
            ->with('user')
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        
        $totales = [
            'total_obras' => Obra::count(),
            'con_imagen' => Obra::whereNotNull('imagen')->count(),
            'sin_imagen' => Obra::whereNull('imagen')->count(),
            'tipos_distintos' => Obra::whereNotNull('tipo')->distinct('tipo')->count('tipo'),
            'autores_distintos' => Obra::whereNotNull('autor')->where('autor', '!=', '')->distinct('autor')->count('autor'),
        ];
        
        // Obras recientes para mostrar en el dashboard
        $obrasRecientes = Obra::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('estadisticas.index', compact(
            'obrasPorTipo', 
            'obrasPorAutor', 
            'obrasPorFecha', 
            'obrasPorUsuario',
            'totales',
            'obrasRecientes'
        ));
    }
    
    /**
     * API para datos de gráficas (para actualizaciones en tiempo real)
     */
    public function apiData()
    {
        $obrasPorTipo = Obra::select('tipo', DB::raw('count(*) as total'))
            ->whereNotNull('tipo')
            ->groupBy('tipo')
            ->get();
        
        $obrasPorMes = Obra::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('YEAR(created_at) as año'),
                DB::raw('count(*) as total')
            )
            ->whereNotNull('created_at')
            ->groupBy('año', 'mes')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->limit(12)
            ->get();
        
        return response()->json([
            'porTipo' => $obrasPorTipo,
            'porMes' => $obrasPorMes,
        ]);
    }
    
    /**
     * Generar gráfica de tipos de obra como imagen
     */
    private function generarGraficaTipos()
    {
        $datos = Obra::select('tipo', DB::raw('count(*) as total'))
            ->whereNotNull('tipo')
            ->groupBy('tipo')
            ->get();
        
        // Crear imagen
        $width = 800;
        $height = 400;
        $img = imagecreatetruecolor($width, $height);
        
        // Colores
        $blanco = imagecolorallocate($img, 255, 255, 255);
        $azulOscuro = imagecolorallocate($img, 30, 64, 175);
        $azulClaro = imagecolorallocate($img, 59, 130, 246);
        $gris = imagecolorallocate($img, 200, 200, 200);
        $negro = imagecolorallocate($img, 0, 0, 0);
        
        // Fondo blanco
        imagefill($img, 0, 0, $blanco);
        
        // Título
        $titulo = "Distribución por Tipo de Obra";
        imagestring($img, 5, 50, 20, $titulo, $azulOscuro);
        
        if ($datos->count() > 0) {
            $barWidth = ($width - 100) / $datos->count() - 10;
            $maxValue = $datos->max('total');
            
            $x = 50;
            $y = 60;
            $barHeight = 250;
            
            foreach ($datos as $index => $item) {
                $heightBar = ($item->total / max($maxValue, 1)) * $barHeight;
                $yBar = $y + $barHeight - $heightBar;
                
                // Dibujar barra
                imagefilledrectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulClaro);
                imagerectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulOscuro);
                
                // Etiqueta
                $label = substr($item->tipo ?? 'N/A', 0, 12);
                imagestring($img, 3, $x + 5, $y + $barHeight + 5, $label, $negro);
                
                // Valor
                imagestring($img, 4, $x + ($barWidth/2) - 10, $yBar - 20, $item->total, $azulOscuro);
                
                $x += $barWidth + 15;
            }
        } else {
            imagestring($img, 4, 50, 200, "No hay datos disponibles", $gris);
        }
        
        // Guardar en buffer
        ob_start();
        imagepng($img);
        $imagenData = ob_get_clean();
        imagedestroy($img);
        
        return 'data:image/png;base64,' . base64_encode($imagenData);
    }
    
    /**
     * Generar gráfica de autores como imagen
     */
    private function generarGraficaAutores()
    {
        $datos = Obra::select('autor', DB::raw('count(*) as total'))
            ->whereNotNull('autor')
            ->where('autor', '!=', '')
            ->groupBy('autor')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();
        
        $width = 800;
        $height = 400;
        $img = imagecreatetruecolor($width, $height);
        
        $blanco = imagecolorallocate($img, 255, 255, 255);
        $verde = imagecolorallocate($img, 16, 185, 129);
        $azulOscuro = imagecolorallocate($img, 30, 64, 175);
        $negro = imagecolorallocate($img, 0, 0, 0);
        
        imagefill($img, 0, 0, $blanco);
        
        $titulo = "Top Autores más Productivos";
        imagestring($img, 5, 50, 20, $titulo, $azulOscuro);
        
        if ($datos->count() > 0) {
            $barHeight = 30;
            $y = 60;
            $maxValue = $datos->max('total');
            
            foreach ($datos as $item) {
                $barWidth = ($item->total / max($maxValue, 1)) * 500;
                
                // Autor
                $autor = substr($item->autor, 0, 20);
                imagestring($img, 4, 50, $y + 8, $autor, $negro);
                
                // Barra
                imagefilledrectangle($img, 250, $y, 250 + $barWidth, $y + $barHeight, $verde);
                imagerectangle($img, 250, $y, 250 + $barWidth, $y + $barHeight, $azulOscuro);
                
                // Valor
                imagestring($img, 4, 260 + $barWidth, $y + 8, $item->total, $azulOscuro);
                
                $y += $barHeight + 10;
            }
        } else {
            imagestring($img, 4, 50, 200, "No hay datos disponibles", $azulOscuro);
        }
        
        ob_start();
        imagepng($img);
        $imagenData = ob_get_clean();
        imagedestroy($img);
        
        return 'data:image/png;base64,' . base64_encode($imagenData);
    }
    
    /**
     * Generar gráfica de obras por año como imagen
     */
    private function generarGraficaAnios()
    {
        $datos = Obra::select(DB::raw('YEAR(fecha) as año'), DB::raw('count(*) as total'))
            ->whereNotNull('fecha')
            ->groupBy('año')
            ->orderBy('año', 'asc')
            ->get();
        
        $width = 800;
        $height = 400;
        $img = imagecreatetruecolor($width, $height);
        
        $blanco = imagecolorallocate($img, 255, 255, 255);
        $naranja = imagecolorallocate($img, 245, 158, 11);
        $azulOscuro = imagecolorallocate($img, 30, 64, 175);
        $negro = imagecolorallocate($img, 0, 0, 0);
        
        imagefill($img, 0, 0, $blanco);
        
        $titulo = "Obras Registradas por Año";
        imagestring($img, 5, 50, 20, $titulo, $azulOscuro);
        
        if ($datos->count() > 0) {
            $barWidth = ($width - 100) / $datos->count() - 10;
            $maxValue = $datos->max('total');
            $barHeight = 250;
            $y = 60;
            
            $x = 50;
            foreach ($datos as $item) {
                $heightBar = ($item->total / max($maxValue, 1)) * $barHeight;
                $yBar = $y + $barHeight - $heightBar;
                
                imagefilledrectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $naranja);
                imagerectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulOscuro);
                
                imagestring($img, 3, $x + 5, $y + $barHeight + 5, $item->año, $negro);
                imagestring($img, 4, $x + ($barWidth/2) - 10, $yBar - 20, $item->total, $azulOscuro);
                
                $x += $barWidth + 15;
            }
        } else {
            imagestring($img, 4, 50, 200, "No hay datos disponibles", $azulOscuro);
        }
        
        ob_start();
        imagepng($img);
        $imagenData = ob_get_clean();
        imagedestroy($img);
        
        return 'data:image/png;base64,' . base64_encode($imagenData);
    }
    
    /**
     * Exportar estadísticas a PDF con gráficas
     */
    public function exportarPdf()
    {
        // Generar las gráficas como imágenes en base64
        $graficaTipos = $this->generarGraficaTipos();
        $graficaAutores = $this->generarGraficaAutores();
        $graficaAnios = $this->generarGraficaAnios();
        
        // Datos para las tablas
        $obrasPorTipo = Obra::select('tipo', DB::raw('count(*) as total'))
            ->whereNotNull('tipo')
            ->groupBy('tipo')
            ->get();
        
        $obrasPorAutor = Obra::select('autor', DB::raw('count(*) as total'))
            ->whereNotNull('autor')
            ->where('autor', '!=', '')
            ->groupBy('autor')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();
        
        $obrasPorFecha = Obra::select(
                DB::raw('YEAR(fecha) as año'),
                DB::raw('count(*) as total')
            )
            ->whereNotNull('fecha')
            ->groupBy('año')
            ->orderBy('año', 'asc')
            ->get();
        
        $totales = [
            'total_obras' => Obra::count(),
            'con_imagen' => Obra::whereNotNull('imagen')->count(),
            'tipos_distintos' => Obra::whereNotNull('tipo')->distinct('tipo')->count('tipo'),
            'autores_distintos' => Obra::whereNotNull('autor')->where('autor', '!=', '')->distinct('autor')->count('autor'),
        ];
        
        // Cargar la vista del PDF con gráficas
        $pdf = Pdf::loadView('pdf.estadisticas-con-graficas', compact(
            'graficaTipos',
            'graficaAutores', 
            'graficaAnios',
            'obrasPorTipo', 
            'obrasPorAutor', 
            'obrasPorFecha', 
            'totales'
        ));
        
        $pdf->setPaper('a4', 'portrait');
        
        // Descargar el PDF
        return $pdf->download('estadisticas_culturales_con_graficas_' . date('Y-m-d') . '.pdf');
    }
}