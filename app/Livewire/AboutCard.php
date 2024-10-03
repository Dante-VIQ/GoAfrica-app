<?php

namespace App\Livewire;

use App\Models\About;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class AboutCard extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $abouts, $about, $title, $merit, $about_id, $user;

    public $detail;

    public $editingAboutID;

    public $editingNewTitle;

    public $editingNewDetail;

    public $editingNewMerit;


    public $image, $imageName, $imageUrl, $photo, $photoName, $photoUrl;

    public $editingNewImage, $editingNewPhoto;

    public $imagePath, $photoPath;

    protected $rules = [
        'detail' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'merit' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,gif,svg|max:10480',
        'photo' => 'required|image|mimes:jpeg,png,gif,svg|max:10480',
    ];
    public function render()
    {
        // $this->abouts = auth()->user()->abouts;
        // $this->abouts = About::latest()->paginate();
        $this->abouts = About::latest()->take(1)->get();

        return view('livewire.about-card');
    }

    //  Show single listing
    public function show($aboutID)
    {
        return view('livewire.includes.about-show')->with('about', About::findOrFail($aboutID));
    }

    public function create(About $about)
    {
        Gate::authorize('create', $about);
        $validated = $this->validate([
            'detail' => 'required',
            'title' => 'required',
            'merit' => 'required',
            'image' => 'required',
            'photo' => 'required',
        ]);

        // $imageName = time() .'.'. $this->image->extension();

        if ($this->image) {
            $validated['image'] = $this->image->store('images', 'public');
        // $imagePath = $this->imageUrl;
        }
        // $this->imageName = basename($imagePath);

        // $photoName = time() .'.'. $this->photo->extension();

        if ($this->photo) {
            $validated['photo'] = $this->photo->store('photos', 'public');
        // $photoPath = $this->photoUrl;
        }

        // $photoPath = $this->photo;
        // $this->photoName = basename($photoPath);



        auth()->user()->abouts()->create($validated);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
        // dd(asset('storage/' . $this->image));
        // dd(asset('storage/' . $this->photo));
    }

    public function edit(About $about)
    {
        Gate::authorize('edit', $about);

        $this->editingAboutID = $aboutID;
        $about = About::findorFail($aboutID);
        $this->editingNewTitle = $about->title;
        $this->editingNewDetail = $about->detail;
        $this->editingNewMerit = $about->merit;
        $this->editingNewImage = $about->image;
        $this->editingNewPhoto = $about->photo;
        $this->editingAbout1D = $aboutID;
    }

    public function update(About $about)
    {
        Gate::authorize('update', $about);

        $validated = $this->validate([
            'editingNewTitle' => 'required',
            'editingNewDetail' => 'required',
            'editingNewMerit' => 'required',
            'editingNewImage' => 'image|max:10240',
            'editingNewPhoto' => 'image|max:10240',
        ]);

        if ($this->image) {
            $validated['editingNewImage'] = $this->image->store('images', 'public');
        }

        if ($this->photo) {
            $validated['editingNewPhoto'] = $this->photo->store('photos', 'public');
        }
        //    $imagePath = $this->imageUrl;

        $about->update($validated);

        About::Find($this->editingAboutID)->update([
            'title' => $this->editingNewTitle,
            'merit' => $this->editingNewMerit,
            'image' => $this->editingNewImage,
            'photo' => $this->editingNewPhoto,
            'detail' => $this->editingNewDetail,
        ]);
        $this->resetFields();
    }

    public function deleteAbout(About $about)
    {
        Gate::authorize('delete', $about);

        About::find($aboutID)->delete();
    }

    // public function placeholder() {
    //     return view('placeholder');
    // }

    private function resetFields()
    {
        $this->title = '';
        $this->detail = '';
        $this->image = '';
        $this->photo = '';
        $this->merit = '';
        $this->about_id = null;
    }
}

//  // Make sure logged in user is owner
//  if ($blog->admin_id != auth()->id()) {
//   abort(403, 'Unauthorized Action');
// }

// $formFields = $request->validate([
//   'title' => 'required',
//   'company' => ['required'],
//   'location' => 'required',
//   'website' => 'required',
//   'email' => ['required', 'email'],
//   'tags' => 'required',
//   'description' => 'required'
// ]);

// if ($request->hasFile('image')) {
//   $formFields['image'] = $request->file('image')->store('images', 'public');
// }

// $blog->update($formFields);

// return back()->with('message', 'Blog updated successfully!');
