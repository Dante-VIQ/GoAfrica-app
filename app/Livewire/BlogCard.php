<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

#[Title('layouts.app')]
class BlogCard extends Component
{
    use WithFileUploads;
    use Commentable;
    public $blogs, $blog, $title, $blog_id, $user;

    #[Rule('required|min:3|max:2000')]
    public $description;

    #[Validate(['image' => 'image|max:10240'])]
    public $image;

    // public function placeholder()
    // {
    //     return view('placeholder');
    // }

    public function create()
    {
        $validated = $this->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'image|max:4096',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('images');
        }

        //  foreach($this->images as $image) {
        //  $validated['images'] = $image->store('images', 'public');
        // }
        // $imagePath = $this->imageUrl;

        auth()->user()->blogs()->create($validated);

        $this->resetFields();

        session()->flash('success', 'Successfully posted');
    }

    public function render()
    {
        $this->blogs = Blog::latest()->take(4)->get();
        return view('livewire.blog-card');
    }

    //  Show single listing
    public function show($blogID)
    {
        return view('blog-lay')
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
