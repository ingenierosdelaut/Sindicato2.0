<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminEdit extends Component
{
    public Usuario $usuario;
    public $confirm_password;
    public $password;
    public $rfc;
    public $curp;
    public $ine;

    public function render()
    {
        $idUser = Auth::user()->id;
        $this->usuario = Usuario::find($idUser);
        return view('livewire.admin.admin-edit')->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function editarAdmin()
    {
        $this->validate();
        if ($this->password) {
            $this->usuario->password = Hash::make($this->password);
        }
        $this->usuario->curp = strtoupper($this->usuario->curp);
        $this->usuario->rfc = strtoupper($this->usuario->rfc);
        $this->usuario->ine = strtoupper($this->usuario->ine);
        $this->usuario->save();
        $this->emit('alert-user-admin-edit', 'Se ha modificado correctamente al administrador');
    }

    protected function rules()
    {
        return ReglasAdmin::reglas($this->usuario->id);
    }
}
