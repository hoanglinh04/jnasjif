<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa Trò chơi</title>
</head>
<body>
    <h1>Chỉnh sửa Trò chơi</h1>
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" value="{{ $game->title }}" required><br>

        <label for="cover_art">Ảnh:</label>
        <input type="file" name="cover_art" accept="image/*"><br>
        @if ($game->cover_art)
            <img src="{{ asset('storage/' . $game->cover_art) }}" alt="{{ $game->title }}" width="100"><br>
        @endif

        <label for="developer">Nhà phát triển:</label>
        <input type="text" name="developer" value="{{ $game->developer }}" required><br>

        <label for="release_year">Năm phát hành:</label>
        <input type="number" name="release_year"  value="{{ $game->release_year }}" required><br>

        <label for="genre">Thể loại:</label>
        <input type="text" name="genre" value="{{ $game->genre }}" required><br>

        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
