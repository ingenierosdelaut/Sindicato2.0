<?php

namespace App\Http\Livewire\Admin;

use App\Models\Descarga;
use Livewire\Component;
use Livewire\WithPagination;

class DescargasIndex extends Component
{
    use WithPagination;
    public $search = '';
    public $cargado = false;
    public function render()
    {
        $descargas = Descarga::join('usuarios', 'usuario_id', '=', 'usuarios.id')
            ->join('documentos', 'doc_id', '=', 'documentos.id')
            ->where('titulo', 'LIKE', '%' . $this->search . '%')
            ->orwhere('nombre', 'LIKE', '%' . $this->search . '%')
            ->orwhere('apellido', 'LIKE', '%' . $this->search . '%')
            ->select(
                'descargas.*',
                'documentos.*',
                'usuarios.nombre',
                'usuarios.apellido'
            )->orderBy('descargas.created_at', 'asc')->paginate(5);
        return view('livewire.admin.descargas-index', compact('descargas'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function cargando()
    {
        $this->cargado = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
