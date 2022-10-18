<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="http://127.0.0.1:8000/users/">

        @csrf
        
        <input type="text" placeholder="name" name="name" id="">
        <input type="" placeholder="Lastname" name="lastname">

        <button type="submit">
            Guardar
        </button>

    </form>

</body>
</html>
