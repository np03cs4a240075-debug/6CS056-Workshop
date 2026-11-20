
<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>

<h1>Create Course</h1>

@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/courses" method="POST">
    @csrf

    <label>Course Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    <br><br>

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>
    <br><br>

    <label>Duration (Weeks)</label>
    <input type="number" name="duration" value="{{ old('duration') }}">
    <br><br>

    <label>Fee</label>
    <input type="number" step="0.01" name="fee" value="{{ old('fee') }}">
    <br><br>

    <label>Difficulty</label>
    <select name="difficulty">
        <option value="">Select Difficulty</option>
        <option value="Easy">Easy</option>
        <option value="Medium">Medium</option>
        <option value="Hard">Hard</option>
    </select>
    <br><br>

    <label>Active</label>
    <select name="is_active">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    <br><br>

    <button type="submit">Create Course</button>
</form>

<br>
<a href="/courses">Back to Courses</a>

</body>
</html>
