<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body class="">

    <div class="container">
        <div class="row">
            <div class="abs-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Login Form</h4>
                            <form action="verificar.php" method="post" class="needs-validation" novalidate>

                                <div class="col-sm-12">
                                    <label for="us_email" class="form-label">Email</label>
                                    <input type="email" name="us_email" id="us_email" class="form-control" placeholder="email" required>
                                    <div class="invalid-feedback">No empty.</div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="us_clave" class="form-label">Password</label>
                                    <input type="password" name="us_clave" id="us_clave" class="form-control" minlength="5" placeholder="password" required>
                                    <div class="invalid-feedback">No empty</div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4 mb-2">Submit</button>

                                <p><a href="loginClave.php"> Olvido su Contaseña</a></p>

                                <!-- <div class="pt-2">
                                
                                <?php /* echo isset($_SESSION["msg"])?$_SESSION["msg"]:"" */ ?>  
                                
                                </div> -->
                            </form>

                            <?php

                            if (isset($_SESSION['msgAccesso'])) {

                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Estatus de la Operación </strong>' . $_SESSION["msgAccesso"] . '<button type="button" class="btn-close" 
                                data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            }

                            unset($_SESSION['msgAccesso']);

                            ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="js\bootstrap.bundle.min.js"></script>
    <script src="js\encomiendas.js"></script>
</body>

</html>