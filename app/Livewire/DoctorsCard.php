<?php

namespace App\Livewire;

use App\Models\Doctor;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;


class DoctorsCard extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $doctors, $doctor, $name, $department, $links, $doctor_id, $user;

    public $edittingDoctorID;
    public $edittingNewName;
    public $detail;

    #[Validate('image|max:10240')]
    public $image,
        $imageUrl,
        $imagePath;

    public function render()
    {
        $this->doctors = Doctor::latest()->take(4)->get();

        return view('livewire.doctors-card');
    }

    // public function placeholder()
    // {
    //     return view('placeholder');
    // }
    public function create()
    {
        $validated = $this->validate([
            'name' => 'required',
            'department' => 'required',
            'detail' => 'required',
            'links' => 'required',
            // 'image' => 'image|max:4096',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('images', 'public');
        }

        $imagePath = $this->imageUrl;

        auth()->user()->doctors()->create($validated);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
    }

    public function edittingDoctorID($id)
    {
        $doctor = Doctor::findorFail($id);
        $this->name = $doctor->name;
        $this->department = $doctor->department;
        $this->links = $doctor->links;
        $this->image = $doctor->image;
        $this->doctor_id = $id;
    }

    // public function updateDoctor()
    // {
    //     $validated = $this->validate([
    //         'name' => 'required',
    //         'department' => 'required',
    //         'links' => 'required',
    //     ]);

    //     if ($this->image) {
    //         $validated['image'] = $this->images->store('image', 'public');
    //     }

    //     // $doctor = Doctor::find($this->doctor_id);
    //     $doctor->update($validated);

    //     $this->resetFields();
    // }

    // Update Listing Data
    public function update(Request $request, Doctor $doctor)
    {
        // Make sure logged in user is owner
        if ($doctor->user_id != Auth::guard()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $validated = $request->validate([
            'name' => 'required',
            'department' => 'required',
            'links' => 'required',
            // 'image' => 'image|max:4096',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('logos', 'public');
        }

        $doctor->update($validated);

        return back()->with('message', 'Listing updated successfully!');
    }

    public function deleteDoctor($id)
    {
        Doctor::find($id)->delete();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->department = '';
        $this->detail = '';
        $this->links = '';
        $this->image = '';
        $this->doctor_id = null;
    }
}
