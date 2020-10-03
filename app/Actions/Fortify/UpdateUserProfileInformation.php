<?php

namespace App\Actions\Fortify;

use App\Validator\ValidationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        try {

            Validator::make($input, [
                'name' => ['required', 'string', 'min:4', 'max:255'],
                'email' => ['required', 'email', 'min:10', 'max:255', Rule::unique('users')->ignore($user->id)],
                'cpf' => ['required', 'integer', 'digits:11',],
                'numTelefone' => ['required', 'integer', 'digits:11'],
                'photo' => ['nullable', 'image', 'max:1024']
            ], \App\Models\User::$messages)->validate('updateProfileInformation');

            if (isset($input['photo'])) {
                $user->updateProfilePhoto($input['photo']);
            }

            if (
                $input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail
            ) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'cpf' => $input['cpf'],
                    'numTelefone' => $input['numTelefone']
                ])->save();

                session()->flash('success', 'Os dados foram atualizados com sucesso');
            }
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors([$exception->getMessage()]);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'cpf' => $input['cpf'],
            'numTelefone' => $input['numTelefone'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
