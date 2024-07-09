 <div class="service-item bg-slate-300 rounded h-100 p-5 wow fadeInUp" data-wow-delay="0.1s">

     <div class="absolute mr-4" x-data="{ show: false }">
         <button x-on:click.prevent="show = true"><i class="fa fa-ellipsis text-3xl"></i> click</button>

         <div class="h-auto w-24 bg-primary" x-show="show" x-on:click.outside.prevent="show = false">
             <ol class="right-4 bg-slate-800 text-slate-300 justify-center p-2">
                 <li wire:click="editService({{ $service->id }})"><a href="#">Edit</a></li>
                 <li wire:click="deleteService({{ $service->id }})"><a href="#">Delete Post</a></li>
             </ol>
         </div>

     </div>

     <div class="inline-flex  items-center justify-center bg-white rounded-circle mb-4"
         style="width: 65px; height: 65px;">
         <i class="fa fa-heartbeat text-primary fs-2"></i>
     </div>
     <div>

         <h4 class="mb-3 justify-self-start">{{ $service->title }}</h4>
         <p class="mb-4">{{ $service->category }}</p>
         <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a>
     </div>

 </div>
