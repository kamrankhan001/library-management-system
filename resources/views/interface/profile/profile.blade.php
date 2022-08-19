@extends('layouts.app')
@section('title', 'Profile')

@section('main')
    <div class="m-10">
        <div class="m-10">
            <div class="flex justify-center">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <p class="capitalize">{{ auth()->user()->name }}</p>
                </div>
                <div class="flex items-center mx-4">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    <p>{{ auth()->user()->mobile_number }}</p>
                </div>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session()->get('success') }}</span>.
            </div>
        @endif

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 mx-auto">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Book Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Category
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Request Date
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Days
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $request->book_name }}
                                    </th>
                                    <td class="py-4 px-6 capitalize">
                                        {{ $request->category }}
                                    </td>
                                    <td class="py-4 px-6 capitalize">
                                        {{ date('m/d/Y', strtotime($request->request_date)) }}
                                    </td>
                                    <td class="py-4 px-6 capitalize">
                                        {{ $request->days }}
                                    </td>
                                    <td class="py-4 px-6 capitalize">
                                        {{ $request->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="my-10 flex flex-wrap -m-12">
                    @foreach ($issues as $issue)
                        <div class="p-12 md:w-1/2 flex flex-col items-start">
                            <div
                                class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="{{ asset('storage/' . $issue->cover_image) }}"
                                        alt="">
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $issue->book_name }}</h5>
                                    </a>

                                    <div class="overflow-x-auto relative">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="py-3 px-6">
                                                        Issue Date
                                                    </th>
                                                    <th scope="col" class="py-3 px-6">
                                                        Returning Date
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ date('m/d/Y', strtotime($issue->issue_date)) }}
                                                    </th>
                                                    <td class="py-4 px-6">
                                                        @php
                                                            $date = explode(' ', $issue->returning_date);
                                                            echo date('m/d/Y', strtotime($date[0]));
                                                        @endphp
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>

@endsection
