<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display all courses
    public function index()
    {
        $courses = Course::all();

        return view('course.list', compact('courses'));
    }

    // Show create form
    public function create()
    {
        return view('course.create');
    }

    // Store new course
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course added successfully!');
    }

    // Display single course
    public function show(Course $course)
    {
        return view('course.detail', compact('course'));
    }

    // Show edit form
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate($this->rules());

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }

    // Validation rules
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'is_active' => 'required|boolean',
        ];
    }
}
