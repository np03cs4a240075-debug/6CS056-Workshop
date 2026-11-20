
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

<h1>Edit Course</h1>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/courses/{{ $course->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Course Name</label>
    <input type="text" name="name"
           value="{{ old('name', $course->name) }}">
    <br><br>

    <label>Description</label>
    <textarea name="description">{{ old('description', $course->description) }}</textarea>
    <br><br>

    <label>Duration (Weeks)</label>
    <input type="number" name="duration"
           value="{{ old('duration', $course->duration) }}">
    <br><br>

    <label>Fee</label>
    <input type="number" step="0.01" name="fee"
           value="{{ old('fee', $course->fee) }}">
    <br><br>

    <label>Difficulty</label>
    <select name="difficulty">
        <option value="Easy" {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
        <option value="Medium" {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
        <option value="Hard" {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
    </select>
    <br><br>

    <label>Active</label>
    <select name="is_active">
        <option value="1" {{ old('is_active', (int)$course->is_active) == 1 ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ old('is_active', (int)$course->is_active) == 0 ? 'selected' : '' }}>No</option>
    </select>
    <br><br>

    <button type="submit">Update Course</button>
</form>

<br>
<a href="/courses">Back to Courses</a>

</body>
</html>
