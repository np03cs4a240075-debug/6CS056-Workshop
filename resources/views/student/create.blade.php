
@extends('layouts.app')

@section('title', 'Create Student')

@section('content')

    <h1>Create Student</h1>

    @if($errors->any())
        <div style="color:red;">
            <h3>Please fix the following errors:</h3>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br><br>

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
        <br><br>

        <label>Address</label>
        <textarea name="address">{{ old('address') }}</textarea>
        <br><br>

        <label>Date of Birth</label>
        <input type="date" name="date_of_birth"
               value="{{ old('date_of_birth') }}">
        <br><br>

        <button type="submit">Create Student</button>
    </form>

    <br>

    <a href="{{ route('students.index') }}">Back to Students</a>

@endsection
