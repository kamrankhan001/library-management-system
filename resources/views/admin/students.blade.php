@extends('layouts.admin')
@section('title', 'Student')

@section('main')
    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        @include('admin.navbar', ['page' => 'Students'])
        <div class="w-full px-6 py-6 mx-auto">
            @livewire('admin.students')
            @include('admin.footer')
        </div>
    </main>
@endsection
