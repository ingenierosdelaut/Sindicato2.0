<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use App\Models\Anuncio;
use App\Models\Request;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class AnuncioIndex extends Component
{
    public function mount()
    {
        $this->anuncio = new Anuncio();
    }


    use WithPagination;

    public $search = '';
    public $cargado = false;
    public Anuncio $anuncio;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // $anuncios = ($this->cargado == true) ? Anuncio::where('titulo', 'LIKE', '%' . $this->search . '%')
        //     // ->orWhere('titulo', 'LIKE', '%' . $this->search . '%')
        //     ->paginate(10) : [];
        // $anuncios = Request::where('id_usuario', auth()->user()->id)->paginate(5);
        $anuncios = Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')
            ->where('titulo', 'LIKE', '%' . $this->search . '%')
            ->orwhere('contenido', 'LIKE', '%' . $this->search . '%')
            ->select(
                'anuncios.*',
                'usuarios.nombre',
                'usuarios.apellido'
            )->latest()->paginate(10);
        return view('livewire.admin.anuncio-index', compact('anuncios'))->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function generarPDF()
    {
        $anuncios = Anuncio::join('usuarios', 'id_usuario', '=', 'usuarios.id')->select(
            'anuncios.*',
            'usuarios.nombre',
            'usuarios.apellido'
        )->paginate();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('livewire.admin.pdfAnuncios', ['anuncios' => $anuncios]);
        return $pdf->stream();
    }

    public function disable($id)
    {
        $this->emit('alert-anuncio-disabled', 'Has desactivado a este anuncio.');
        Anuncio::find($id)->fill(['estado' => 0])->save();
    }

    public function enable($id)
    {
        $this->emit('alert-anuncio-enable', 'Has activado a este anuncio.');
        Anuncio::find($id)->fill(['estado' => 1])->save();
    }

    public function delete(Anuncio $anuncio)
    {
        $anuncio->delete();
        $this->emit('alert-anuncio-delete', 'Has eliminado correctamente este anuncio');
        return redirect(route("admin.anuncios"));
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
