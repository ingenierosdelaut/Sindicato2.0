<?php

namespace App\Http\Livewire\Admin;


class ReglasAdmin
{
    public static function reglas($id = null)
    {
        $validarpassword = ($id) ? 'required|min:8' : 'required|min:8';
        return [
            'usuario.nombre' => 'required|string',
            'usuario.apellido' => 'required|string',
            'usuario.email' => 'required|email|unique:usuarios,email,' . $id,
            'password' => $validarpassword,
            'confirm_password' => 'same:password|required',
            'usuario.telefono' => 'required|string',
            'usuario.puesto' => 'required|string',
            'usuario.departamento' => 'required|string',
            'usuario.curp' => 'required|string',
            'usuario.rfc' => 'required|string',
            'usuario.ine' => 'required|string',
            'usuario.fecha_ingreso' => 'required|date',
            'usuario.fecha_afiliacion' => 'required|date',
        ];
    }
}
