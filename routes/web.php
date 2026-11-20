
<?php

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


// HOME PAGE
Route::get('/', function () {
    return view('welcome');
});


// ===============================
// STUDENT CRUD
// ===============================

// Show Student Create Form
Route::get('/student/create', function () {
    return view('student.create');
});

// Store Student
Route::post('/students', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create($validated);

    return redirect('/students')
        ->with('success', 'Student added successfully!');
});

// Display All Students
Route::get('/students', function () {
    $students = Student::all();

    return view('student.list', compact('students'));
});

// Display Single Student
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.detail', compact('student'));
});

// Show Student Edit Form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
});

// Update Student
Route::put('/students/{id}', function (Request $request, $id) {

    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students')
        ->with('success', 'Student updated successfully!');
});

// Delete Student
Route::delete('/students/{id}', function ($id) {

    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully!');
});


// ===============================
// COURSE CRUD
// ===============================

// Show Course Create Form
Route::get('/courses/create', function () {
    return view('course.create');
});

// Store Course
Route::post('/courses', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    Course::create($validated);

    return redirect('/courses')
        ->with('success', 'Course added successfully!');
});

// Display All Courses
Route::get('/courses', function () {
    $courses = Course::all();

    return view('course.list', compact('courses'));
});

// Display Single Course
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.detail', compact('course'));
});

// Show Course Edit Form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', compact('course'));
});

// Update Course
Route::put('/courses/{id}', function (Request $request, $id) {

    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course->update($validated);

    return redirect('/courses')
        ->with('success', 'Course updated successfully!');
});

// Delete Course
Route::delete('/courses/{id}', function ($id) {

    $course = Course::findOrFail($id);
    $course->delete();

    return redirect('/courses')
        ->with('success', 'Course deleted successfully!');
});
