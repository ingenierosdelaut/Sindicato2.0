<?php

namespace App\Http\Livewire\Admin;

use App\Models\Documento;
use App\Models\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class IndexDocumento extends Component
{
    public function mount()
    {
        $this->documento = new Documento();
    }


    public $cargado = false;
    protected $paginationTheme = 'bootstrap';
    use WithPagination;
    use WithFileUploads;
    public $search;
    public $url_doc;

    public function render()
    {
        $documentos = Documento::paginate(5);
        return view('livewire.admin.index-documento', compact('documentos'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function desactivar($id)
    {
        Storage::disk('public')->delete($this->documento->url_doc);
        Documento::find($id)->fill(['estado' => 0])->save();
        $this->emit('alert-documento-desactivar', 'Has desactivado el documento correctamente');
    }


    public function fileUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:doc,docx,pdf|max:2048'
        ]);
        $fileModel = new Documento();
        if ($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('/documentos', $fileName, 'public');
            $fileModel->titulo = $req->file->getClientOriginalName();
            $fileModel->url_doc = $filePath;
            $fileModel->save();
            return back()
                ->with('success', 'El documento ha sido guardado.')
                ->with('file', $fileName);
        }
        return view('livewire.admin.documentos-upload');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function cargando()
    {
        $this->cargado = true;
    }
}
