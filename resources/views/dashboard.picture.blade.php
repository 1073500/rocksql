<form action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    <input type="file" name="profile_picture" accept="image/*" required>
    <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">Upload</button>
</form>
