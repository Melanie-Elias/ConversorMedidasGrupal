<?php
include_once 'UnidadMoneda.php';
include_once 'Lempira.php';
include_once 'Euro.php';
include_once 'Dolar.php';
include_once 'Peso.php';
include_once 'Quetzal.php';
include_once 'Cordoba.php';
include_once 'Colon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cant = $_POST['cant'];
  $De = $_POST['De'];
  $A = $_POST['A'];

  $De_obj = new $De($cant);
  $resultado = $De_obj->convertirA(new $A(0), $cant);
} else {
  $cant = '';
  $De = 'Dolar';
  $A = 'Dolar';
  $resultado = '';
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <title>Conversor de Medidas</title>
</head>
<body>
<h1 style="text-align: center; margin:12px;">Calculadora con cinco unidades de Medida</h1>
<nav class="navbar navbar-expand-lg" style="justify-content: center; background-color: #1E90FF;">
  <div class="container-flex" style="justify-content: center;">
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" >
    <a class="nav-link " aria-current="page"style="padding :5px 30px;  font-size:  29px; font-family: 'Tilt Neon', cursive; " href="../Volumen/Volumen.php">Volumen</a>
        <a class="nav-link" style="padding :5px 30px; font-size:  29px; font-family: 'Tilt Neon', cursive;" href="../Longitud/longitud.php">Longitud</a>
        <a class="nav-link" style="padding :5px 30px;  font-size:  29px; font-family: 'Tilt Neon', cursive; " href="../Tiempophp.php">Tiempo</a>
        <a class="nav-link" style="padding :5px 30px;  font-size:  29px; font-family: 'Tilt Neon', cursive; " href="#">Moneda</a>
        <a class="nav-link" style="padding :5px 30px;  font-size:  29px; font-family: 'Tilt Neon', cursive; " href="../Masa.php">Masa</a>
        <a class="nav-link" style="padding :5px 30px;  font-size:  29px; font-family: 'Tilt Neon', cursive; " href="../Temperatura/Temperatura.php">Temperatura</a>
      </div>
    </div>
  </div>
</nav>

<h1 class="text-center">Conversor de Moneda</h1>
    <div class="container">
        <form method="POST">
            <div class="row mt-4">
                <div class="col-sm-4">
                    <div>
                        <label class="form-label">Cantidad:</label>
                        <input type="number" name="cant" value="<?= $cant ?>" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label">De:</label>
                    <select name="De" class="form-select">
                        <option value=" ">--Selecciona un tipo de moneda-</option>
                        <option value="Quetzal" <?= $De === 'Quetzal' ? 'selected' : '' ?>>Quetzal</option>
                        <option value="Cordoba" <?= $De === 'Cordoba' ? 'selected' : '' ?>>Cordoba</option>
                        <option value="Colon" <?= $De === 'Colon' ? 'selected' : '' ?>>Colon</option>
                        <option value="Euro" <?= $De === 'Euro' ? 'selected' : '' ?>>Euro</option>
                        <option value="Dolar" <?= $De === 'Dolar' ? 'selected' : '' ?>>Dolar</option>
                        <option value="Lempira" <?= $De === 'Lempira' ? 'selected' : '' ?>>Lempira</option>
                        <option value="Peso" <?= $De === 'Peso' ? 'selected' : '' ?>>Peso</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="form-label">A:</label>
                    <select name="A" class="form-select">
                        <option value="" selected>--Selecciona un tipo de moneda--</option>
                        <option value="Quetzal" <?= $A === 'Quetzal' ? 'selected' : '' ?>>Quetzal</option>
                        <option value="Cordoba" <?= $A === 'Cordoba' ? 'selected' : '' ?>>Cordoba</option>
                        <option value="Colon" <?= $A === 'Colon' ? 'selected' : '' ?>>Colon</option>
                        <option value="Euro" <?= $A === 'Euro' ? 'selected' : '' ?>>Euro</option>
                        <option value="Dolar" <?= $A === 'Dolar' ? 'selected' : '' ?>>Dolar</option>
                        <option value="Lempira" <?= $A === 'Lempira' ? 'selected' : '' ?>>Lempira</option>
                        <option value="Peso" <?= $A === 'Peso' ? 'selected' : '' ?>>Peso</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary w-100 py-4">Convertir</button>
                </div>
                <div class="col-sm-6">
                    <label for="resultado" class="form-label">RESULTADO:</label>
                    <input <?php if (isset($resultado)) ?> value="<?php echo $resultado ?>" class="form-control" />
                </div>
            </div>
        </form>
    </div>

</body>
</html>