<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObraPdfController extends Controller
{
    /**
     * Exportar todas las obras a PDF
     */
    public function exportAll()
    {
        $obras = Obra::with('user')->orderBy('created_at', 'desc')->get();
        
        $pdf = Pdf::loadView('pdf.obras', compact('obras'));
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download('todas_obras_culturales.pdf');
    }
    
    /**
     * Exportar una obra específica a PDF
     */
    public function exportSingle($id)
    {
        $obra = Obra::with('user')->findOrFail($id);
        
        // Convertir imagen a base64 si existe
        $imagenBase64 = null;
        if ($obra->imagen && Storage::disk('public')->exists($obra->imagen)) {
            $imagenPath = Storage::disk('public')->path($obra->imagen);
            $imagenBase64 = 'data:image/' . pathinfo($imagenPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($imagenPath));
        }
        
        $pdf = Pdf::loadView('pdf.obra-single', compact('obra', 'imagenBase64'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('obra_' . $obra->id . '_' . str_replace(' ', '_', $obra->titulo) . '.pdf');
    }
    
    /**
     * Vista previa del PDF (opcional)
     */
    public function preview($id)
    {
        $obra = Obra::with('user')->findOrFail($id);
        
        $imagenBase64 = null;
        if ($obra->imagen && Storage::disk('public')->exists($obra->imagen)) {
            $imagenPath = Storage::disk('public')->path($obra->imagen);
            $imagenBase64 = 'data:image/' . pathinfo($imagenPath, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($imagenPath));
        }
        
        $pdf = Pdf::loadView('pdf.obra-single', compact('obra', 'imagenBase64'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->stream();
    }
}