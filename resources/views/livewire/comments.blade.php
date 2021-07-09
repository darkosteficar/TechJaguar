<div class="antialiased mx-auto w-3/4 ">
    <h3 class="mb-4 text-xl font-semibold text-green-400">Comments</h3>
        @if (session('message'))
            <div class="bg-green-500 text-white font-semibold border border-white py-1 px-2 rounded full mb-2">
                {{ session('message') }}
            </div>
           
        @endif
      <!-- comment form -->
      <div class="flex mx-auto items-center justify-center shadow-lg   mb-4 ">
        <form class="w-full  bg-gray-800 border border-green-400 rounded-sm px-4 pt-2 " wire:submit.prevent="addComment">
        <div class="flex flex-wrap -mx-3 mb-6 ">
            <h2 class="px-4 pt-3 pb-2 text-gray-300 text-lg">Add a Comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 text-green-400 focus:border-green-500 focus:border-2 focus:outline-none focus:bg-gray-900 focus:ring-0" name="body" placeholder='Your comment' wire:model="comment" required></textarea>
            </div>
            <div class="w-full md:w-full flex items-end justify-end md:w-full px-3">

                <div class="-mr-1">
                     <button type='submit' class="bg-green-400 text-gray-700 font-medium py-1 px-4 border border-green-400 rounded-lg tracking-wide mr-1 hover:bg-green-600 hover:text-white">
                        Post
                    </button>
                        
                </div>
            </div>
        </form>
        </div>
    </div>

            <!-- component -->
    <div class="space-y-4">
        {{ $allComments->links() }}
        @foreach ($allComments as $comment)
        <div class="flex ">
           
            <div class="flex-shrink-0 mr-3">
            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('images/'. $comment->user->image) }}" alt="">
            </div>
            
                <div class="flex-1 relative border border-green-400 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed bg-gray-800">
                    <strong class="text-green-400 text-lg">{{ $comment->user->name }}</strong> <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                    <p class="text-md text-white">
                        {{ $comment->comment }}
                    </p>
                    <!--
                    <div class="mt-4 flex items-center">
                        <div class="flex -space-x-2 mr-2">
                        <img class="rounded-full w-6 h-6 border border-green-400" src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
                        <img class="rounded-full w-6 h-6 border border-green-400" src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80" alt="">
                        </div>
                        <div class="text-sm text-gray-500 font-semibold">
                        5 Replies
                        </div>
                    </div>
                    -->
                    <div class="absolute bg-green-400 top-0 right-0 w-full h-full rounded-md bg-opacity-20 " 
                    x-data='{show: false,id: {{ $comment->id }}}' x-show="show" x-init="@this.on('posted',(commentId) => { 
                       
                            show = true;
                            setTimeout(() => {show = false},2000,console.log(commentId,id))
                        })"
                    >
                    </div>
                </div>
                
        </div>
        

        
        @endforeach
       <!--
    <div class="flex">
        <div class="flex-shrink-0 mr-3">
        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
        </div>
        <div class="flex-1 border border-green-400 bg-gray-800 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
            <strong class="text-green-400 text-lg">Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
            <p class="text-md text-white">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                sed diam nonumy eirmod tempor invidunt ut labore et dolore
                magna aliquyam erat, sed diam voluptua.
            </p>
            
            <h4 class="my-5 uppercase tracking-wide text-gray-400 font-bold text-xs">Replies</h4>
    
            <div class="space-y-4">
                <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                </div>
                <div class="flex-1 bg-gray-200 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                    <p class="text-xs sm:text-sm">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                    </p>
                </div>
                </div>
                <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                    <p class="text-xs sm:text-sm">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                    magna aliquyam erat, sed diam voluptua.
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
-->
    </div>

</div>
