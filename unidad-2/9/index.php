<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            margin: 20;
            padding: 20;
            box-sizing: border-box;
            align-items: center;
            background-color: whitesmoke;
        }
        canvas{
            background-color: white;
        }
    </style>
    <title>Canvas</title>
</head>
<body class="container">
    <h1>Actividad</h1>
    <h2>Canvas</h2>
    <img src="./guitar.jpeg"  alt="" id="imagen" style="display: none">
    <canvas id="mycanvas" width="500" height="500">
    

    </canvas>
</body>

<script type="text/javascript">
    
    let canvas = document.getElementById('mycanvas')
    let ctx = canvas.getContext('2d')
    //console.log(ctx)

    var img = document.getElementById('imagen')
    ctx.drawImage(img, 10,10)
        
</script>
</html>