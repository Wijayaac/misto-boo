
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book View</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
  <div class="container">
    @include('header')
    <form action="/" method="get" class="form">
        <div class="form-field flex">
            <label for="limit">Data limit</label>
            <select name="limit" id="limit">
                @php
                $limit = \Request::query('limit');
                @endphp
                @for ($i = 1; $i <= 10; $i++)
                    @php
                    $value = $i * 10;
                    @endphp
                    <option value="{{$value}}" {{ $limit == $value ? 'selected' : '' }}>{{$value}}</option>
                @endfor
            </select>
        </div>
        <div class="form-field">
            <label for="search">Search Data</label>
            <input type="text" name="search" id="search" value="{!! \Request::query('search'); !!}">
        </div>
        <button type="submit">Filter</button>
    </form>
    <div class="container">
        <table class="table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Average Rating</th>
                    <th>Votes</th>
                </tr>
            </thead>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{!! substr($item->rating, 0, -3 ) !!}</td>
                    <td>{{ $item->votes }}</td>
                </tr>
            @endforeach
        </table>
        {{ $books->links() }}
    </div>
  </div>
</body>

</html>