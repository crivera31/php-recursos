<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Simple</title>
</head>
<body>
    <button onclick="mensaje()">
        enviar peticion ajax
    </button>
    <h1 id="title"></h1>
    <script>
        function mensaje() {
            //console.log('hello') //muestra msj por consola
            var object = new XMLHttpRequest(); 
            object.open('POST','pedir.php',true);
            object.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            object.onreadystatechange = function() {
                document.getElementById('title').innerHTML = object.responseText;
            }
            object.send('username=diego');
        }
    </script>
</body>
</html>