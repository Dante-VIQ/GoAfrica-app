<?php

namespace App\Livewire;

use App\Models\Feature;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class FeatureCard extends Component
{
    use WithFileUploads;

    public $features, $feature, $feature_id, $user;
    #[Rule('required|min:20|max:1000')]
    public $description;

    #[Rule('required|min:3|max:255')]
    public $title;
    #[Rule('required|min:3|max:30')]
    public $edittingFeatureID;
    #[Rule('required|min:3|max:30')]
    public $edittingNewName;

    #[Validate('image|max:10240')]
    public $image,
        $imageUrl,
        $imagePath;



    public function render()
    {
        $this->features = Feature::latest()->take(1)->get();
        return view('livewire.feature-card');
    }

    // public function placeholder()
    // {
    //     return view('placeholder');
    // }

    public function create()
    {
        $validated = $this->validate([
            'title' => 'required',
            'description' => 'required',
            // 'tags' => 'required',
            'image' => 'image|max:4096',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('images');
        }

        $imagePath = $this->imageUrl;

        auth()->user()->features()->create($validated);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
    }

    public function editingFeatureID($id)
    {
        $feature = Feature::findorFail($id);
        $this->titles = $feature->titles;
        $this->description = $feature->description;
        // $this->tags = $feature->tags;
        $this->image = $feature->image;
        $this->feature_id = $id;
    }

    public function updateFeature()
    {
        $validated = $this->validate([
            'titles' => 'required',
            'description' => 'required',
            // 'tags' => 'required',
            // 'image' => 'image|max:4096',
        ]);

        if ($this->image) {
            $validated['image'] = $this->images->store('image', 'public');
        }

        $feature = Feature::find($this->feature_id);
        $feature->update($validated);

        $this->resetFields();
    }

    public function deleteFeature($id)
    {
        Feature::find($id)->delete();
    }

    private function resetFields()
    {
        $this->titles = '';
        $this->description = '';
        $this->image = '';
        $this->feature_id = null;
    }
}
