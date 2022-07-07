<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsuariosEditPassword extends Component
{
    public Usuario $usuario;
    public $password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.admin.usuarios-edit-password')->layout('layouts.app-admin')->slot('slotAdmin');
    }

    public function editpwd()
    {
        $this->validate();
        if ($this->password) {
            $this->usuario->password = Hash::make($this->password);
        }
        $this->usuario->save();
    }

    protected function rules()
    {
        return ReglasUsuario::reglas($this->usuario->id);
    }
}
