<?php

namespace App\Livewire;

use App\Models\Destination;
use App\Models\Header;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SelectView extends Component
{

    public $categoryID;

    public $destinationID;

    #[Computed()]
    public function destinations(){
        return Destination::all();
    }

    #[Computed()]
    public function headers(){
        return Header::where('destination_id', $this->destinationID);
    }


    public function render()
    {
        return view('livewire.select-view');
    }
}
