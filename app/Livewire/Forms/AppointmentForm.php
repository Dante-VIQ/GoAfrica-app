<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AppointmentForm extends Form
{
    #[Rule('required|min:3|max:200')]
    public $name;

    #[Rule('required|email|max:255')]
    public $email;

    #[Rule('required|number|0-9')]
    public $mobile;

    public $doctor, $doctor_id;

    public $start;

    public $end;

    public $problem;
}
