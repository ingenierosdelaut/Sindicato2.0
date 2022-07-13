<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsuariosEditPassword extends Component
{
    public Usuario $usuario;
    public $password;
    public $confirm_password;

    public function render()
    {
        $idUser = Auth::user()->id;
        $this->usuario = Usuario::find($idUser);
        return view('livewire.admin.usuarios-edit-password')->layout('layouts.app-user')->slot('slotUser');
    }

    public function editpwd()
    {
        $this->validate();
        if ($this->password) {
            $this->usuario->password = Hash::make($this->password);
        }
        $this->emit('alert-user-pwd', 'Has cambiado tu contraseña correctamente');
        $this->usuario->save();
        return redirect(route('anuncios.index'));
    }

    protected function rules()
    {
        return ReglasUsuario::reglas($this->usuario->id);
    }
}
