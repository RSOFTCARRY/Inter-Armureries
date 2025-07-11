<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AppLayout extends Component
{
    public string $title;

    /**
     * Crée une nouvelle instance du composant.
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * Renvoie la vue associée à ce layout.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
