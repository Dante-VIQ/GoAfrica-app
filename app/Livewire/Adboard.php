<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('DawaIT')]
class Adboard extends Component
{
    public function render()
    {
        $this->adboards = Adboard::All();
        return view('livewire.adboard');
    }
}
