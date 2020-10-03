<?php

namespace App\Http\Livewire;

use App\Validator\ValidationException;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UpdateUserAddressInformation extends Component
{

    public $user;
    public $rua, $numResidencia, $bairro, $cep;
    private $input = array();

    public function mount($user)
    {
        $this->user = $user;
        $this->rua = $this->user->rua;
        $this->numResidencia = $this->user->numeroResidencia;
        $this->bairro = $this->user->bairro;
        $this->cep = $this->user->cep;
    }

    public function render()
    {
        return view('livewire.update-user-address-information');
    }

    public function update()
    {
        $this->input = [
            'rua' => $this->rua, 'numeroResidencia' => $this->numResidencia,
            'bairro' => $this->bairro, 'cep' => $this->cep
        ];

        try {

            Validator::make($this->input, [
                'rua' => ['required', 'string'],
                'numeroResidencia' => ['required', 'string', 'min:1', 'max:6'],
                'bairro' => ['required', 'string', 'min:3', 'max:30'],
                'cep' => ['required', 'integer', 'digits:8'],
            ], \App\Models\User::$messages)->validate('update');

            $this->user->forceFill([
                'rua' => $this->input['rua'],
                'numeroResidencia' => $this->input['numeroResidencia'],
                'bairro' => $this->input['bairro'],
                'cep' => $this->input['cep'],
            ])->save();

            $this->resetErrorBag();
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors([$exception->getMessage()]);
        }
    }
}
