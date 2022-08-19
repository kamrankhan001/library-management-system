<main>
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="mt-6">
                <div class="mb-6 mx-2">
                    <label for="search"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                    <input type="search" id="search"
                        class="w-44 bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:ring-0 focus:border-black"
                        placeholder="Book Name" wire:model="search">
                </div>
            </div>
    
            <div class="flex flex-wrap -m-4 mb-10">
                @foreach ($books as $book)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a href="{{ route('book_detail', ['id'=>$book->id]) }}" class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                src="{{ asset('storage/'.$book->cover_image) }}">
                        </a>
                        <div class="mt-4">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$book->category}}</h3>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{$book->book_name}}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
    
    {{ $books->links('pagination') }}
    
</main>