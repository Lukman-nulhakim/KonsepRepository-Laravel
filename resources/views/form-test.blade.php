<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Contact</h1>
    @if (session()->has('pesan'))
        <div class="alert alert-danger">
            {{ session()->get('pesan') }}
        </div>
    @endif
    <form action="/contact/store" method="POST">
        {{ csrf_field() }}
        <input type="text" name="full_name" placeholder="nama">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="phone" placeholder="phone">
        <button type="submit">Kirims</button>
    </form>
</body>
</html>