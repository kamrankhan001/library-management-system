@extends('layouts.admin')
@section('title', 'Dashboard')

@section('main')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('admin.navbar', ['page' => 'Dashboard'])
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -m-4 mt-1">
                <a href="{{route('students')}}"
                    class="block lg:w-1/3 md:w-1/2 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Students
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{$students}}</p>
                </a>
                <a href="{{route('admin_books')}}"
                    class="block lg:w-1/3 md:w-1/2 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total Books
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{$books}}</p>
                </a>
                <a href="{{route('request_books')}}"
                    class="block lg:w-1/3 md:w-1/2 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Today Books
                        Request</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-center">{{$today_request}}</p>
                </a>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                </div>
            </div>
            <div
                class="flex justify-between items-center px-6 py-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Landed Books</h6>
            </div>
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-b-2xl bg-clip-border">
                <div class="flex-auto px-0 pt-0 pb-2">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Book
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Student Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Mobile Number
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Issue Date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Returning Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($students as $student) 
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$student->name}}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{$student->email}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{$student->mobile_number}}
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>
@endsection
