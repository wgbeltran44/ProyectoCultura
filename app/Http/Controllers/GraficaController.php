<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Support\Facades\DB;

class GraficaController extends Controller
{
    /**
     * Generar gráfica de tipos de obra como imagen
     */
    public function generarGraficaTipos()
    {
        $datos = Obra::select('tipo', DB::raw('count(*) as total'))
            ->whereNotNull('tipo')
            ->groupBy('tipo')
            ->get();
        
        // Crear imagen
        $width = 800;
        $height = 500;
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
            $y = 80;
            $barHeight = 300;
            
            foreach ($datos as $index => $item) {
                $heightBar = ($item->total / $maxValue) * $barHeight;
                $yBar = $y + $barHeight - $heightBar;
                
                // Dibujar barra
                imagefilledrectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulClaro);
                imagerectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulOscuro);
                
                // Etiqueta
                $label = substr($item->tipo ?? 'N/A', 0, 15);
                imagestring($img, 3, $x + 5, $y + $barHeight + 5, $label, $negro);
                
                // Valor
                imagestring($img, 4, $x + ($barWidth/2) - 10, $yBar - 20, $item->total, $azulOscuro);
                
                $x += $barWidth + 15;
            }
        } else {
            imagestring($img, 4, 50, 250, "No hay datos disponibles", $gris);
        }
        
        // Guardar imagen
        $path = storage_path('app/public/graficas/tipos.png');
        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        imagepng($img, $path);
        imagedestroy($img);
        
        return $path;
    }
    
    /**
     * Generar gráfica de autores como imagen
     */
    public function generarGraficaAutores()
    {
        $datos = Obra::select('autor', DB::raw('count(*) as total'))
            ->whereNotNull('autor')
            ->where('autor', '!=', '')
            ->groupBy('autor')
            ->orderBy('total', 'desc')
            ->limit(8)
            ->get();
        
        $width = 800;
        $height = 500;
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
            $y = 80;
            $maxValue = $datos->max('total');
            
            foreach ($datos as $item) {
                $barWidth = ($item->total / $maxValue) * 500;
                
                // Autor
                $autor = substr($item->autor, 0, 20);
                imagestring($img, 4, 50, $y + 8, $autor, $negro);
                
                // Barra
                imagefilledrectangle($img, 250, $y, 250 + $barWidth, $y + $barHeight, $verde);
                
                // Valor
                imagestring($img, 4, 260 + $barWidth, $y + 8, $item->total, $azulOscuro);
                
                $y += $barHeight + 10;
            }
        }
        
        $path = storage_path('app/public/graficas/autores.png');
        imagepng($img, $path);
        imagedestroy($img);
        
        return $path;
    }
    
    /**
     * Generar gráfica de obras por año como imagen
     */
    public function generarGraficaAnios()
    {
        $datos = Obra::select(DB::raw('YEAR(fecha) as año'), DB::raw('count(*) as total'))
            ->whereNotNull('fecha')
            ->groupBy('año')
            ->orderBy('año', 'asc')
            ->get();
        
        $width = 800;
        $height = 500;
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
            $barHeight = 300;
            $y = 80;
            
            $x = 50;
            foreach ($datos as $item) {
                $heightBar = ($item->total / $maxValue) * $barHeight;
                $yBar = $y + $barHeight - $heightBar;
                
                imagefilledrectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $naranja);
                imagerectangle($img, $x, $yBar, $x + $barWidth, $y + $barHeight, $azulOscuro);
                
                imagestring($img, 3, $x + 5, $y + $barHeight + 5, $item->año, $negro);
                imagestring($img, 4, $x + ($barWidth/2) - 10, $yBar - 20, $item->total, $azulOscuro);
                
                $x += $barWidth + 15;
            }
        }
        
        $path = storage_path('app/public/graficas/anios.png');
        imagepng($img, $path);
        imagedestroy($img);
        
        return $path;
    }
}