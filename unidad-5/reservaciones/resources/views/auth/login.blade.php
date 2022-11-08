<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>
        @if (Auth::user())
            {{ Auth::user()->name }}
        @endif
    </h1>

    <form action="{{ url('login') }}" method="post">

        @csrf

        <label for="">
            Email:
        </label>
        <input type="email" name="email" id="" value="">

        <label for="">
            Password:
        </label>
        <input type="password" name="password" id="" value="">

        <button type="submit">
            Iniciar Sesión
        </button>

    </form>
</body>
</html>
