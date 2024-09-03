<?php

namespace App\Livewire;

use App\Models\AnalysisDashboard as ModelsAnalysisDashboard;
use App\Models\Blog;
use App\Models\City;
use App\Models\Destination;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;

class AnalysisDashboard extends Component
{
    public $analyzes, $analyze, $users, $user, $user_id;

    #[Computed()]
    public function getUserCountProperty()
    {
        return User::count(); // Get the total number of users

    // return view('users.index', compact('userCount'));
    }

    #[Computed()]
    public function getDestinationCountProperty()
    {
        return Destination::count();
    }

    #[Computed()]
    public function getBlogCountProperty()
    {
        return Blog::count();
    }

    #[Computed()]
    public function getCityCountProperty()
    {
        return City::count();
    }
    public function render()
    {
        // $this->analysis = AnalysisDashboard::all()->get();
        // // $this->analyzes = AnalysisDashboard::all();
        return view('livewire.analysis-dashboard');
    }
}
