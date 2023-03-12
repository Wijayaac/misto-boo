
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Top Author</title>

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
    <div class="container">
        <table class="table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Author Name</th>
                    <th>Votes</th>
                </tr>
            </thead>
            @foreach ($authors as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->votes }}</td>
                </tr>
            @endforeach
        </table>
    </div>
  </div>
</body>

</html>