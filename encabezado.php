<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/select2b4.min.css">
  <link rel="stylesheet" href="css/stylepanel.css">
  <link rel="stylesheet" href="css/remesas.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Sweetalert2 -->
  <link rel="stylesheet" href="css/sweetalert2.css ">
  <!-- webcamjs -->
  <script src="plugins/webcamjs/webcam.min.js"></script>
  <!-- html2pdf -->
  <script src="plugins/html2pdf/dist/html2pdf.bundle.min.js"></script>


  <title>Document</title>
</head>

<body>

  <?php $nuevo = [1, 2]; //para permisos de admin y usuario

  $nuevoMovimiento = [1, 4]; //para permisos de admin y validador en el modulo Movimientos


  //echo "<p></p>idUsuario:" . $_SESSION["idUsuario"]. "</p>";
  //echo "<p>rolUsuario: " . $_SESSION["rolUsuario"]. "</p>";
  //echo "<p>Usuario: " . $_SESSION["Usuario"]. "</p>";
  //echo "<p>idAgente: " . $_SESSION["idAgente"]. "</p>";
  //echo "<p>valor de inarray: " . in_array($_SESSION["rolUsuario"], $nuevo). "</p>"


  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="panel.php">PacoMoney</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarCliente" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cliente
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarCliente">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="clienteFoto.php">Nuevo</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="clienteTabla.php">Listar</a></li>
              <li><a class="dropdown-item" href="clienteReporte.php">Resumen</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarBeneficiario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Beneficiario
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarBeneficiario">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="beneficiario.php">Nuevo</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="beneficiarioTabla.php">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarAgente" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Agente
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarAgente">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="pagador.php">Nuevo</a></li> 
              <?php } ?>
              <li><a class="dropdown-item" href="pagadorTabla.php">Listar</a></li>
              <li><a class="dropdown-item" href="cuenta.php">Cuenta</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarGiro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Giro
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarGiro">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="giro.php">Nuevo</a></li>
                <li><a class="dropdown-item" href="giroMultiplesVistas.php">Nuevo Multiple</a></li>                
              <?php } ?>
              <li><a class="dropdown-item" href="giroTabla.php">Listar</a></li>
              <li><a class="dropdown-item" href="giroTablaUsuario.php">Operaciones</a></li>
              <li><a class="dropdown-item" href="girosReporteV01.php">Pichicha Excel</a></li>
              <li><a class="dropdown-item" href="girosReporteV02.php">Pichincha Texto</a></li>              
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarMovimiento" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Movimientos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarMovimiento">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="movimiento.php">Nuevo</a></li>
              <?php } ?>

              <?php if (in_array($_SESSION["rolUsuario"], $nuevoMovimiento)) { ?>
                <li><a class="dropdown-item" href="movimientoCarga.php">Carga Masiva</a></li>
              <?php } ?>


              <li><a class="dropdown-item" href="movimientoLista.php">Lista</a></li>
              <li><a class="dropdown-item" href="movimientoListaTP.php">Tipo de Cambio</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarUsuario" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuario
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarUsuario">
              <?php if ($_SESSION["rolUsuario"] == 1) { ?>
                <li><a class="dropdown-item" href="usuario.php">Nuevo</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="usuarioTabla.php">Listar</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarBanco" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Banco
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarBanco">
              <?php if (in_array($_SESSION["rolUsuario"], $nuevo)) { ?>
                <li><a class="dropdown-item" href="banco.php">Nuevo</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="bancoTabla.php">Listar</a></li>
            </ul>
          </li>

          <li class="nav-item">

            <a class="nav-link" href="calculadora.php">Calculadora</a>

          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarCliente" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cambios
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarCliente">
              <?php if ($_SESSION["rolUsuario"] == 1) { ?>
                <li><a class="dropdown-item" href="pais.php">Matriz</a></li>
                <li><a class="dropdown-item" href="paisTasa.php">Matriz Tasa</a></li>
                <li><a class="dropdown-item" href="paisTasasGlobal.php">Matriz Global</a></li>
                <li><a class="dropdown-item" href="agencias.php">Agentes</a></li>  
                <li><a class="dropdown-item" href="giroTasa.php">Agentes Tasa</a></li>
                <li><a class="dropdown-item" href="agenteComisionesReporte.php">Agente Resumen</a></li>
                <li><a class="dropdown-item" href="giroComisionesReporte.php">Giro Resumen</a></li>

              <?php } ?>              
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="loginOut.php">LoginOut</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>