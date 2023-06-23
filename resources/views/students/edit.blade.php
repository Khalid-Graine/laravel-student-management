@extends('master.master')


@section('title', 'Create')

@section('content')
    <div class="h-screen w-full flex justify-center items-center content-center bg-gray-100">
        <div class="w-fit shadow-md shadow-gray-600 bg-transparent">
            <form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-col bg-gray-200 gap-6 p-3 w-fit mx-auto ">
                    <div>
                        <label for="name">name</label>
                        <input type="text" name="name" value="{{ old('name', $student->name) }}"> <br>
                        @error('name')
                        <p class="text-red-500"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email">email</label>
                        <input type="email" name="email" value="{{ old('email', $student->email) }}"> <br>
                        @error('email')
                        <p class="text-red-500"> {{ $message }}</p>
                       @enderror
                    </div>
                    <div>
                        <label for="gender">Choose a gener:</label>
                        <select name="gender">
                            <option value="boy">boy</option>
                            <option value="girl">girl</option>
                        </select> <br>
                        @error('gender')
                       <p class="text-red-500"> {{ $message }}</p>
                       @enderror
                    </div>
                    <div>
                        <label for="">image</label>
                        <input type="file" name="image" >
                        @error('image')
                        <p class="text-red-500"> {{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="p-2 rounded-sm text-white bg-blue-500">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
