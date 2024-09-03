<div>
    @unless (count($blogs) == 0)

        <div class="grid gap-4 lg:grid-cols-3 pt-20">
            @foreach ($blogs as $blog)
                {{-- <article wire:key="{{ $blog->id }}"
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <span
                            class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                </path>
                            </svg>
                            Tutorial
                        </span>
                        <span class="text-sm">{{ $blog->created_at }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                            href="#">{{ $blog->title }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400 h-40 overflow-hidden text-wrap">{{ $blog->description }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full" src="{{ $blog->user->profile_photo_url }}"
                                alt="Jese Leos avatar" />
                            <span class="font-medium dark:text-white">
                                {{ $blog->user->name }}
                            </span>
                        </div>
                        <a href="/blogs/{{ $blog->id }}"
                            class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>

                </article> --}}

                <div class="absolute top-2 right-2">
                    <div x-data="{ show: false }">
                        <x-button x-on:click.prevent="show = true">show<i class="fa fa-ellipsis text-3xl"></i></x-button>
                        <div class="h-auto w-24 bg-gray-dark">
                            <div x-show="show" x-on:click.outside.prevent="show = false">
                                <ol class="right-4 bg-slate-800 text-slate-300 justify-center p-2">
                                    @can('update', $blog)
                                        <li><a wire:click.live="edit({{ $blog->id }})" href="#">Edit</a></li>
                                    @endcan
                                    <li><a wire:click.live="delete({{ $blog->id }})" href="#">Delete</a></li>
                                    <li><a href="#">Share</a></li>
                                    <li><a href="#">Report</a></li>
                                    {{-- <li><a href="#">Save Post</a></li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
               
                <article wire:key="{{ $blog->id }}" class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                        <p href="#" class="text-sm pb-3">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->user->name }}</a>,
                            {{ $blog->created_at }}
                        </p>
                        <a href="#" class="pb-6 h-44 overflow-hidden text-wrap">{{ $blog->description }}</a>
                        <a href="/blogs/{{ $blog->id }}" class="uppercase text-gray-800 hover:text-black">Continue
                            Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
    @endunless

    {{-- @if (auth()->check() && auth()->user()->isMaster()) --}}
    <div class="flex">
        @can('create', $blog)
            <div class="relative p-5 mx-auto" x-data="{ show: false }">
                <x-button x-on:click.prevent="show = true" class="px-4 py-2 text-light rounded bg-primary"><i
                        class="fa fa-add text-primary"></i>
                    Add Blog</x-button>

                <div class="mx-auto z-9 top-1/3 left-1/3" x-show="show" x-on:click.outside.prevent="show = false">
                    @include('livewire.includes.blog-create')
                </div>
            </div>
        @endcan

        
        {{-- @endif --}}


    </div>
</div>
