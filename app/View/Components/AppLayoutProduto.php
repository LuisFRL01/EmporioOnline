<?php

namespace App\View\Components;

use App\Models\Categoria;
use Illuminate\View\Component;

class AppLayoutProduto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categorias = Categoria::all();
        return view('components.app-produto', ['categorias' => $categorias]);
    }
}
