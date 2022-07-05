<?php

namespace App\Http\Livewire\Documentos;

use App\Models\Documento;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DocumentosIndex extends Component
{
    public function render()
    {
        $documentos = Documento::all();
        return view('livewire.documentos.documentos-index', compact('documentos'));
    }

    public function descarga($id)
    {
        $documento = Documento::find($id);
        $documentoLink = $documento->url_doc;

        return Storage::disk('public')->download($documentoLink);
    }
    public function vista($id)
    {
        $documento = Documento::find($id);
        $documentoLink = $documento->url_doc;
        // return Storage::disk('public')->get($documentoLink);
        $doc = Storage::loadView('template', $documento);
        $doc->stream('documentname');
    }
}
