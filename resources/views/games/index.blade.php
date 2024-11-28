<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Trò chơi</title>
</head>
<body>
    <h1>Danh sách Trò chơi</h1>
    <a href="{{ route('games.create') }}">Thêm mới</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Nhà phát triển</th>
            <th>Năm phát hành</th>
            <th>Thể loại</th>
            <th>Hành động</th>
        </tr>
        @foreach ($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->title }}</td>
                <td>
                    @if($game->cover_art)
                        <img src="{{ asset('storage/' . $game->cover_art) }}" alt="{{ $game->title }}" width="100">
                    @else
                        Ko co anh
                    @endif
                </td>
                <td>{{ $game->developer }}</td>
                <td>{{ $game->release_year }}</td>
                <td>{{ $game->genre }}</td>
                <td>
                    <a href="{{ route('games.edit', $game->id) }}">Sửa</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
