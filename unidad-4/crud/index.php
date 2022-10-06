<?php
include_once "./app/config.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
 
    <!-- <link rel="stylesheet" type="text/css" href="public/css/main.css"> -->

    <title>Document</title>
</head>
<body class="vh-100">
    

    
    <div class="container">
    
        <form action="<?= BASE_PATH ?>auth" method="post" class="col-sm-12 col-md-6 mx-auto px-5 bg-secondary my-5 rounded-4 shadow">
            <fieldset >
                <div class="row">
                    <legend class="text-center my-4 fs-2">
                        Iniciar sesión
                    </legend>

                </div>
                <div class="row">
                    <label for="" class="w-75 mt-2 mx-auto p-0 my-1 fs-5">Email: </label>
                    <input type="text" value="abdiel2_19@alu.uabcs.mx" class="w-75 mx-auto fs-5" name="email" id="" placeholder="Escribe aqui">

                </div>

                <div class="row">
                    <label for="" class="w-75 mt-2 mx-auto p-0 my-1 fs-5">Password: </label>
                    <input type="password" value="41htT%pYl0I6kZ" name="password" class="w-75 mx-auto fs-5" placeholder="* * * * *">

                </div>
                <div class="row">
                    <button class="w-50 mx-auto my-5 p-2 fs-3 rounded-2 bg-primary shadow border-0">Acceder</button>
                </div>

                <input type="hidden" name="action" value="access">
                <input type="hidden" name="token" value="<?= $_SESSION['global_token']?>">
            </fieldset>
        </form>

    </div>
</body>
</html>