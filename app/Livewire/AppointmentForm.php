<?php

namespace App\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class AppointmentForm extends Component
{

    public AppointmentForm $form;
    // public DoctorsCard $doctors;

    public function submitForm(){
        $this->validate();

        // send email

        session()->flash('success', 'Appointment Created');

        $this->form->reset();
    }


    public function render()
    {
        return view('livewire.appointment-form');
    }

    // public function mount($doctor) {
    //     $this->doctor->$doctor;
    // }
}
