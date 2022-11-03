<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="http://127.0.0.1:8000/clients" method="post">
        @csrf
        <label for="">
            Nombre:
        </label>
        <input type="text" name="name" id="">

        <label for="">
            Email:
        </label>
        <input type="email" name="email" id="">

        <label for="">
            Phone number:
        </label>
        <input type="text" name="phone_number" id="">

        <button type="submit">
            Guardar
        </button>
    </form>
</body>
</html>
