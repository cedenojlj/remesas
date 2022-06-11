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
                            <form action="recuperarPass.php" method="post" class="needs-validation" novalidate>

                                <div class="col-sm-12">
                                    <label for="us_email" class="form-label">Email</label>
                                    <input type="email" name="us_email" id="us_email" class="form-control" placeholder="email" required>
                                    <div class="invalid-feedback">No empty.</div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4 mb-2">Submit</button>

                                <p><a href="index.php"> Regresar </a></p>
                                <!-- <div class="pt-2">
                                                                                             
                                
                                </div> -->
                            </form>

                            <?php

                            if (isset($_SESSION['controlClave'])) {

                                if ($_SESSION['controlClave'] == 1) {

                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> Estatus de la Operación </strong>' . $_SESSION["msgclave"] . '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                                } else {

                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Estatus de la Operación </strong>' . $_SESSION["msgclave"] . '<button type="button" class="btn-close" 
                                        data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                }
                            }

                          unset($_SESSION['controlClave']);
                          unset($_SESSION['msgclave']);



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