<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [ // validar input del registro
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:20'],
            'telefono' => ['required', 'string', 'max:45'],
            'domicilio' => ['string', 'max:60'],
            'fecha' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
// SENTENCIA PARA GUARDAR NUEVO REGISTRO DE USUARIO desde valor input
        return User::create([
            'name' => $input['name'],
            'apellido' => $input['apellido'],
            'dni' => $input['dni'],
            'telefono'=> $input['telefono'],
            'domicilio'=> $input['domicilio'],
            'fecha'=> $input['fecha'],
            'email' => $input['email'],
            'rol' => '1',
            'password' => Hash::make($input['password']),
        ]);
    }
}
