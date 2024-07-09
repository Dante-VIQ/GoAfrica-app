<?php

namespace App\Livewire;


use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceList extends Component
{

    use WithPagination;
   public $services, $service, $title, $category, $service_id, $user;
   
   
    public function render()
    {
        // sleep(3);
        // $this->services = auth()->user()->services;
        $this->services = Service::latest()->take(6)->get();

        return view('livewire.service-list');
    }

    // public function placeholder() {
    //     return view('placeholder');
    // }
       
    public function create()
    {
         $validatedData = $this->validate([
            'title' => 'required',
            'category' => 'required',
         ]);

         
        auth()->user()->services()->create($validatedData);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
    }

    public function editService($id){
        $service = Service::findorFail($id);
        $this->title = $service->title;
        $this->category = $service->category;
        $this->service_id = $id;

    }

    public function updateService() {

        $validatedData = $this->validate([
            'title' => 'required',
            'category' => 'required',
         ]);

        $service = Service::find($this->service_id);
        $service->update($validatedData);

        $this->resetFields();
    }

    public function deleteService($id) {
        Service::find($id)->delete();
    }

    private function resetFields(){
        $this->title = '';
        $this->category = '';
        $this->service_id = null;
    }
}
