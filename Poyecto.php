<!DOCTYPE html>
<html>
<head>
  <title>Juego PAR & IMAPAR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php

// Considerando que se ha jugado 
function pinta($elemento,$jugador)
{
    echo "<span class='badge bg-secondary'>$jugador</span>";
    switch ($elemento) {
        case "PIEDRA":
          echo "<img class='img-fluid' src='PAR.png' alt='PAR' width=100 height=100>";
          break;
        case "PAPEL":
          echo "<img class='img-fluid' src='IMPAR.png' alt='IMPAR' width=100 height=100>";
          break;
      }
}

if (isset($_POST["jugar"])) { // Si se ha enviado el formulario 
    $jugada = $_POST["jugada"];
    $juego=array("PAR","IMPAR");
    $maquina = $juego[rand(0,1)];
    echo "<div class='container mt-3'>";
   
    if ($jugada == $maquina)
        echo "<h1>Empate</h1>","<img class='img-fluid' src='EMPATE.jpg' alt='IMPAR' width=100% >";
    elseif($jugada == "IMPAR" && $maquina == "PAR"
    
       )
   {
        echo "<h1>Victoria</h1>","<img class='img-fluid' src='ganador.jpg' alt='IMPAR' width=100% >";
    }
    else{
        echo "<h1>Victoria para la maquina</h1>","<img class='img-fluid' src='MAQUINA.png' alt='IMPAR' width=100% >";
    }
    echo "</div>";
}
else
{
?>
<div class="container mt-3 text-center">
    <h1>Juego PAR & IMPAR</h1><br>
    <h7>Introduccion:
        "El juego se basa en el par impar de toda la vida (par&nones) tambien en algunos casos, basicamente consiste en que hay dos opciones NºPares(le representa el 2)
        NºImpares(le representa el 3) y el gandor es mayor numero simpre gana entre maquina/jugador "
    </h7>
    
    <form class="was-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                
                    <label for="cita" class="form-label">Nombre</label>
                    <textarea class="form-control" id="evento" rows="1" name="evento" placeholder="Introduzca el nombre de jugador o alias" required></textarea>
                    <div class="valid-feedback">Valido.</div> 
                    <label for="hora" class="form-label">Hora de comienzo</label>
                    <input type="time" name="hora" class="form-control"></input>
                    <div class="valid-feedback">Valido.</div> 
    
        <div >
        <input type="radio" class="form-check-input"   value="PAR"  >PAR /
        <input type="radio" class="form-check-input"  value="IMPAR" >IMPAR <br><br>

            <label class="form-check-label" for="PAR">
                <img class="img-fluid" src="PAR.png" alt="PAR" width="100" height="100">
            </label><br>
            <input type="radio" class="form-check-input" id="PAR" name="jugada" value="PAR" >
        </div>
        <div >
            <label class="form-check-label" for="IMPAR">
                <img class="img-fluid" src="IMPAR.png" alt="IMPAR" width="100" height="100">
            </label><br>
            <input type="radio" class="form-check-input" id="IMPAR" name="jugada" value="IMPAR" >
        </div>
    
    <br>
    <button type="submit" class="btn btn-primary" name="jugar" value="jugar" >JUGAR!</button>
    </form>
</div>
<?php
}
?>
</body>
</html>