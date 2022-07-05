<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Livewire\Component;

class Denegado extends Component
{
    public $estado;
    public $cargado = false;
    public function render()
    {

        return view('livewire.admin.denegado');
    }

    public function crear($id)
    {
        $this->validate();
        Usuario::find($id)->fill(['estado' => 0])->save();
        $this->emit('alert-user-create', 'Has registrado a un nuevo usuario correctamente');
        return redirect(route('admin.usuarios'));
    }
}
