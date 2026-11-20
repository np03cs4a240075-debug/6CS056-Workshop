
@extends('layouts.app')

@section('title', 'Student List')

@section('content')

    <h1>Student List</h1>

    <a href="{{ route('students.create') }}">Add New Student</a>

    <br><br>

    @if(session('success'))
    <x-alert>
        {{ session('success') }}
    </x-alert>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date of Birth</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->date_of_birth }}</td>

                    <td>
                        <a href="{{ route('students.show', $student->id) }}">
                            View
                        </a>

                        |

                        <a href="{{ route('students.edit', $student->id) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('students.destroy', $student->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this student?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
