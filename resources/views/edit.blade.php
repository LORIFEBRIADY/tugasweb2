<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}"><br><br>

    <textarea name="content">{{ $post->content }}</textarea><br><br>

    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" width="100"><br><br>
    @endif

    <input type="file" name="image"><br><br>

    <button type="submit">Update</button>
</form>