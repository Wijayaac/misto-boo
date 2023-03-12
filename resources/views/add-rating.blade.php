
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
    <form action="/rating" method="post" class="form">
        <div class="form-field">
            <label for="author">Book Author</label>
            <input type="text" name="author" id="author" list="authors">
            <datalist id="authors">
                @foreach ($authors as $author)                    
                <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-field flex">
                <label for="limit">Rating</label>
                <select name="limit" id="limit">
                    @for ($i = 0; $i < 10; $i++)
                        @php
                        $value = $i + 1;
                        @endphp
                        <option value="{{$value}}">{{$value}}</option>
                    @endfor
                </select>
            </div>
        <button type="submit">Filter</button>
    </form>
  </div>
</body>

</html>