<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="title" placeholder="Judul"><br><br>

    <textarea name="content" placeholder="Isi"></textarea><br><br>

    <input type="file" name="image"><br><br>

    <button type="submit">Simpan</button>
</form>