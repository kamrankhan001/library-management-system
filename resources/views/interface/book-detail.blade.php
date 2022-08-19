@extends('layouts.app')
@section('title', 'Book Detail')

@section('main')
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="{{ asset('storage/'.$book->cover_image) }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$book->book_name}}</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            Category
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$book->category}}</h2>
                        </span>
                    </div>
                    <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha
                        taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn.
                        Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra
                        jean shorts keytar banjo tattooed umami cardigan.</p>
                    <form action="{{route('book_request')}}" method="POST">
                        @csrf
                        @auth
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        @endauth
                        <input type="hidden" name="book_id" value="{{$book->id}}">
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                            <div class="flex items-center">
                                <span class="mr-3">Select Day</span>
                                <div class="relative">
                                    <select name="days"
                                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                        <option>1 Week</option>
                                        <option>2 Week</option>
                                        <option>3 Week</option>
                                        <option>4 Week</option>
                                    </select>
                                    <span
                                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <button type="submit"
                                class="flex ml-auto text-white bg-red-400 border-0 py-2 px-6 focus:outline-none hover:bg-red-500 rounded">
                                Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
