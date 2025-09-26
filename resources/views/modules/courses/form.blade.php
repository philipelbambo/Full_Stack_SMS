<div>
    <label class="block font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block font-semibold">Code</label>
    <input type="text" name="code" value="{{ old('code', $course->code ?? '') }}" class="w-full border px-3 py-2 rounded" required>
    @error('code') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block font-semibold">Description</label>
    <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description', $course->description ?? '') }}</textarea>
    @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block font-semibold">Credits</label>
    <input type="number" name="credits" value="{{ old('credits', $course->credits ?? '') }}" class="w-full border px-3 py-2 rounded">
    @error('credits') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block font-semibold">Thumbnail</label>
    <input type="file" name="thumbnail" class="w-full border px-3 py-2 rounded">
    @if(!empty($course->thumbnail))
        <img src="{{ asset('storage/'.$course->thumbnail) }}" class="w-24 mt-2 rounded">
    @endif
    @error('thumbnail') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
</div>

<div>
    <label class="inline-flex items-center">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $course->is_active ?? true) ? 'checked' : '' }}>
        <span class="ml-2">Active</span>
    </label>
</div>
