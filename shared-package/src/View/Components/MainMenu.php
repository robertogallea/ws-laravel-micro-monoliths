<?php
namespace LaravelDay2025\SharedPackage\View\Components;

use Illuminate\View\Component;

class MainMenu extends Component
{
    public function render()
    {
        return view('shared::components.main-menu');
    }
}