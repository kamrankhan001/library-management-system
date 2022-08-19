@extends('layouts.app')
@section('title', 'Home')

@section('main')
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Why you have to read books
                    <br class="hidden lg:inline-block">
                </h1>
                <p class="mb-8 leading-relaxed">Apparently, the practice of reading books creates cognitive engagement that
                    improves lots of things, including vocabulary, thinking skills, and concentration. It also can affect
                    empathy, social perception, and emotional intelligence, the sum of which helps people stay on the planet
                    longer.</p>
                <div class="flex justify-center">
                    @auth
                        <a href="{{ route('profile') }}"
                            class="inline-flex items-center bg-red-400 border-0 py-1 px-3 focus:outline-none hover:bg-red-500 text-white rounded text-base mt-4 md:mt-0">Profile
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center bg-red-400 border-0 py-1 px-3 focus:outline-none hover:bg-red-500 text-white rounded text-base mt-4 md:mt-0">Register
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="{{ asset('assets/images/book1.jpg') }}">
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <h1 class="text-4xl text-center">Most Borrow</h1>
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book2.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Psychology</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Psychology of Money</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book3.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Business</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Company Of One</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book4.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Novel</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Picture in Dorian Gray</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book5.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Novel</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Heart is the sea</h2>
                    </div>
                </div>

                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book2.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Psychology</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Psychology of Money</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book3.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Business</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Company Of One</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book4.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Novel</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Picture in Dorian Gray</h2>
                    </div>
                </div>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                            src="{{ asset('assets/images/book5.jpg') }}">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Novel</h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium">Heart is the sea</h2>
                    </div>
                </div>
            </div>
    </section>
@endsection
