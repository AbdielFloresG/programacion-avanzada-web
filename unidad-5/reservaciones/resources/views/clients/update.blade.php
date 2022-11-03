<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ url('clients/') }}" method="post">
        @method('PUT')
        @csrf
        <label for="">
            Nombre:
        </label>
        <input type="text" name="name" id="" value="{{ $client->name }}">

        <label for="">
            Email:
        </label>
        <input type="email" name="email" id="" value="{{ $client->email }}">

        <label for="">
            Phone number:
        </label>
        <input type="text" name="phone_number" id="" value="{{ $client->phone_number }}">

        <input type="hidden" name="id" value="{{ $client->id }}">

        <button type="submit">
            Actualizar
        </button>
    </form>
</body>
</html>
