{{-- resources/views/courses/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Course Details</h1>

    <p><strong>Title:</strong> {{ $course->title }}</p>
    <p><strong>Code:</strong> {{ $course->code }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Credits:</strong> {{ $course->credits }}</p>
    <p><strong>Duration:</strong> {{ $course->duration_weeks }} weeks</p>
    <p><strong>Active:</strong> {{ $course->is_active ? 'Yes' : 'No' }}</p>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
