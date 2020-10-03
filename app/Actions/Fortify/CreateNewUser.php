<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Validator\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        try {

            Validator::make($input, \App\Models\User::$rules, \App\Models\User::$messages)->validate();

            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'cpf' => $input['cpf'],
                'numTelefone' => $input['numTelefone'],
                'rua' => $input['rua'],
                'numeroResidencia' => $input['numeroResidencia'],
                'bairro' => $input['bairro'],
                'cep' => $input['cep'],
                'password' => Hash::make($input['password']),
            ]);
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors([$exception->getMessage()]);
        }
    }
}
