<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới Trò chơi</title>
</head>
<body>
    <h1>Thêm mới Trò chơi</h1>
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required><br>

        <label for="cover_art">Ảnh:</label>
        <input type="file" name="cover_art" accept="image/*" required><br>

        <label for="developer">Nhà phát triển:</label>
        <input type="text" name="developer" required><br>

        <label for="release_year">Năm phát hành:</label>
        <input type="number" name="release_year"  required><br>

        <label for="genre">Thể loại:</label>
        <input type="text" name="genre" required><br>

        <button type="submit">Thêm</button>
    </form>
</body>
</html>
