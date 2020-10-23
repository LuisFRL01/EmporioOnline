<?php

namespace App\Http\Livewire;

use App\Validator\ValidationException;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class UpdateUserCreditCardInformation extends Component
{

    public $user;
    public $cartao;

    public function mount($user)
    {
        $this->user = $user;
        $this->cartao = $this->user->cartao;
    }

    public function render()
    {
        return view('livewire.update-user-credit-card-information');
    }

    public function update()
    {
        $input = [
            'cartao' => $this->cartao
        ];

        try {

            Validator::make($input, [
                'cartao' => ['required', 'integer', 'digits:16'],
            ], ['O cartão deve ter 11 dígitos'])->validate('update');

            $this->user->forceFill([
                'cartao' => $this->cartao,
            ])->save();

            session()->flash('success', 'Os dados foram atualizados com sucesso');

            $this->resetErrorBag();
        } catch (ValidationException $exception) {
            return back()->withInput()->withErrors([$exception->getMessage()]);
        }
    }
}
