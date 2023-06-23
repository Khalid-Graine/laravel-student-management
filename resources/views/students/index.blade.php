@php
    $searchQuery = $searchQuery ?? '';
@endphp
@extends('master.master')


@section('title', 'Students')

@section('content')

    <div class="w-7/12 mx-auto p-2 ">

        <form action="{{ route('students.index') }}" method="get">
            @csrf
            <div class=" flex items-center px-1 ">
                <input type="text" name="query" placeholder="Search for a student"
                    class="outline-none   h-9 px-2   flex-grow border-0 border-b-2 border-black" value="{{ $searchQuery }}">

                <button type="submit" class="text-2xl  mx-2 hover:text-blue-500  ">
                    <i class="fa-solid fa-magnifying-glass px-1"></i>
                </button>

                <a href="{{ route('students.index', $students) }}" class="text-2xl  mr-2 hover:text-red-500 ">
                    <i class="fa-solid fa-clock-rotate-left px-1"></i>
                </a>
            </div>
        </form>


        <div class="flex justify-between p-2  items-center bg-gray-100 mt-3">
            <p class="text-lg font-bold">Students Informations</p>
            <a href="{{ route('students.create') }}" class="p-1 px-3 bg-green-300 rounded-sm hover:bg-green-200">Add</a>
        </div>
        @if ($students->count() > 0)

            <table class="w-full mt-3 border-2 border-gray-200 ">
                <thead class="border-[1px] border-b-black ">
                    <tr class="border-2 border-red-300">
                        <th class="p-2 border-2">image</th>
                        <th class="p-2 border-2">name</th>
                        <th class="p-2 border-2">email</th>
                        <th class="p-2 border-2">gender</th>
                        <th class="p-2 border-2">actions</th>
                    </tr>
                </thead>
                @foreach ($students as $student)
                    <tbody>
                        <tr class="hover:bg-slate-50 cursor-default">
                            <td class="p-1 border-2 ">
                                <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}"
                                    class="rounded-full w-16 h-16 object-cover overflow-hidden mx-auto">
                            </td>
                            <td class="p-1 border-2">{{ $student->name }}</td>
                            <td class="p-1 border-2">{{ $student->email }}</td>
                            <td class=" p-1 border-2">{{ $student->gender }}</td>
                            <td class=" p-1 border-2">
                                <div class="w-full items-center justify-center flex flex-row gap-2">
                                    <a href="{{ route('students.show', $student) }}"
                                        class="p-2 bg-yellow-300 rounded-sm hover:bg-yellow-200">
                                        view</a>

                                    <a href="{{ route('students.edit', $student) }}"
                                        class="p-2 bg-blue-300 rounded-sm hover:bg-blue-200">
                                        edit</a>

                                    <form action="{{ route('students.destroy', $student) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-300 rounded-sm hover:bg-red-200">Delete</button>
                                    </form>
                                </div>
                            </td>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <p class="mt-2">{{ $students->links() }}</p>
        @endif
    </div>
@endsection
