<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body{
        height: 500px;
        width:600px;
        border: 1px solid white;
        text-align: center;
        margin: 0 auto;
    }
    .form {
    display: grid;
    padding: 1em;
    background: #f9f9f9;
    border: 1px solid #c1c1c1;
    margin: 2rem auto 0 auto;
    max-width: 800px;
    padding: 1em;
    box-sizing: 300px;
    size: 200px;
    }
</style>
</head>


<body>
<form class= "form" action="tarea mkdir.php" method = "POST">

    
            <label for="">
                <input type="datetime-local" id= "hora" name ="hora" >
                <br><br>
            </label>

        
            <label for="">
                <input type="text" id= "pensamientos" name ="pensamientos" placeholder ="ingrese aqui sus pensamientos" >
                <br><br>
            </label>

            <label for="">
                <input type="text" id= "carpeta" name ="carpeta" placeholder ="nombre de carpeta" >
                <br><br>
            </label>

            <input type="submit" name ="enviar">
</form>

    <?php

        $horayfecha= $_POST['hora'];
        
        $pensamientos = $_POST['pensamientos'];
        $carpeta = $_POST['carpeta'];
       
        if (!file_exists($carpeta)) {
            mkdir($carpeta);
        }
        $archivo= "$carpeta/ $carpeta".".txt";
        $texto = "$pensamientos";
        $fp = fopen($archivo, "a+"); //Apertura para lectura y escritura. Puntero al final del archivo. Si no existe se intenta crear.
        
        fputs($fp,$horayfecha);
        fputs($fp,": ");
        fputs($fp,$texto.PHP_EOL);  

        $fp = fopen($archivo, "r"); 
      fclose($fp);

    ?>
</body>
</html>