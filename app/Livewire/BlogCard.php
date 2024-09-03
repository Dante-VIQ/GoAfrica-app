<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Middleware\Authorize;
use Livewire\Attributes\Computed;
use Request;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

#[Title('layouts.app')]
class BlogCard extends Component
{
    use WithFileUploads;
    use Commentable;
    public $blogs, $blog, $title, $blog_id, $user;
public $NewTitle;
public $NewDescription;
public $NewImage;
public $blogID;
    #[Rule('required|min:3|max:2000')]
    public $description;

    #[Validate(['image' => 'image|max:10240'])]
    public $image;

    // public function placeholder()
    // {
    //     return view('placeholder');
    // }

    protected $rules = [
        'Title' => 'required',
        'Description' => 'required',
        'Image' => 'image|sometimes|nullable|max:10240',
        'NewTitle' => 'required',
        'NewDescription' => 'required',
        'NewImage' => 'image|sometimes|nullable|max:10240',

    ];
    public function create()
    {
        $validated = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|sometimes|nullable|max:10240',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('images', 'public');
        }

        //  foreach($this->images as $image) {
        //  $validated['images'] = $image->store('images', 'public');
        // }
        // $imagePath = $this->imageUrl;

        auth()->user()->blogs()->create($validated);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
    }

    public function edit(Blog $blog){
        Gate::authorize('update', $blog);
        return view ('Blog.edit', ['blog' => $blog]);
    }

    public function update(Blog $blog)
    {
        Gate::authorize('update', $blog);
        $validated = $this->validate([
            'NewTitle' => 'required',
            'NewDescription' => 'required',
            // 'image' => 'image|sometimes|nullable|max:10240',
        ]);

        if ($this->image) {
            $validated['NewImage'] = $this->image->store('images', 'public');
        }
        //    $imagePath = $this->imageUrl;

        $blog->update($validated);

        // Blog::Find($this->editingAboutID)->update([
        //     'title' => $this->editingNewTitle,
        //     'merit' => $this->editingNewMerit,
        //     'image' => $this->editingNewImage,
        //     'photo' => $this->editingNewPhoto,
        //     'detail' => $this->editingNewDetail,
        // ]);
        $this->resetFields();
    }

    public function destroy(Blog $blog){
        Gate::authorize('delete', $blog);
        $blog->delete();

        return to_route('dashboard');
    }

    public function render()
    {
        $this->blogs = Blog::latest()->take(4)->get();
        return view('livewire.blog-card');
    }

    //  Show single listing
    #[Computed()]
    public function show($blogID)
    {
        return view('yutpo')
        ->with('blog', Blog::findOrFail($blogID));
    }

    private function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->image = '';
        $this->blog_id = null;
    }
}
