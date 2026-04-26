<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid rgb(242, 6, 6);
            padding: 8px;
        }
        a {
            text-decoration: none;
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <h1>Daftar Post</h1>

    <a href="{{ route('posts.create') }}">+ Tambah Post</a>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Aksi</th>
            <th>Gambar</th>
        </tr>
        @foreach ($posts as $post)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$post->title}}</td>
            <td>
                <a href="{{ route('posts.show', $post->id) }}">Lihat</a>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
            <td>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" width="100">
                @endif
            </td>
         </tr>
            @endforeach
    </table>
</body>
</html>