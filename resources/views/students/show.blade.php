@extends('master.master')


@section('title', $student->name)

@section('content')
<div class="h-screen flex justify-center items-center bg-gray-50">

    <div class="w-60 h-60 mx-auto flex flex-col justify-center items-center bg-gray-50 shadow-md shadow-black">
        <img src="{{ asset('storage/'.$student->image) }}" alt="" class="w-36 w h-36 object-cover rounded-full ">
        <p class="f font-medium">{{ $student->name }}</p>
        <p>{{ $student->email }}</p>
        <p>{{ $student->gender }}</p>
    </div>

</div>
@endsection
