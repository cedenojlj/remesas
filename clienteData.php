<?php

session_start();

$permisoActualizar = [1, 4];

//echo "<p> rol de usuario: ". $_SESSION["rolUsuario"]. "</p>";
//echo "<p> Usuario: " .$_SESSION["Usuario"]. "</p>";
//echo "<p> in array: ". in_array($_SESSION["rolUsuario"], $permisoActualizar). "</p>";


require_once 'conexion.php';

//Recuperar los clientes para el datatable

$idCliente = isset($_POST['idCliente']) ? intval(htmlentities($_POST['idCliente'])) : '';
$cl_nombre = isset($_POST['cl_nombre']) ? htmlentities($_POST['cl_nombre']) : '';
$cl_apellido = isset($_POST['cl_apellido']) ? htmlentities($_POST['cl_apellido']) : '';
$cl_fechaNacimiento = isset($_POST['cl_fechaNacimiento']) ? htmlentities($_POST['cl_fechaNacimiento']) : '';
$idPais = isset($_POST['idPais']) ? htmlentities($_POST['idPais']) : '';
$cl_provincia = isset($_POST['cl_provincia']) ? htmlentities($_POST['cl_provincia']) : '';
$cl_ciudad = isset($_POST['cl_ciudad']) ? htmlentities($_POST['cl_ciudad']) : '';
$cl_direccion = isset($_POST['cl_direccion']) ? htmlentities($_POST['cl_direccion']) : '';
$cl_tlf = isset($_POST['cl_tlf']) ? htmlentities($_POST['cl_tlf']) : '';
$cl_email = isset($_POST['cl_email']) ? htmlentities($_POST['cl_email']) : '';
$cl_identidad = isset($_POST['cl_identidad']) ? htmlentities($_POST['cl_identidad']) : '';
$idTipoIdentidad = isset($_POST['idTipoIdentidad']) ? htmlentities($_POST['idTipoIdentidad']) : '';
$cl_fechaEmision = isset($_POST['cl_fechaEmision']) ? htmlentities($_POST['cl_fechaEmision']) : '';
$cl_fechaCaducidad = isset($_POST['cl_fechaCaducidad']) ? htmlentities($_POST['cl_fechaCaducidad']) : '';
$cl_nacionalidad = isset($_POST['cl_nacionalidad']) ? htmlentities($_POST['cl_nacionalidad']) : '';
$cl_facebook = isset($_POST['cl_facebook']) ? htmlentities($_POST['cl_facebook']) : '';
$cl_whatsapp = isset($_POST['cl_whatsapp']) ? htmlentities($_POST['cl_whatsapp']) : '';
$cl_telegram = isset($_POST['cl_telegram']) ? htmlentities($_POST['cl_telegram']) : '';
$cl_limite = isset($_POST['cl_limite']) ? htmlentities($_POST['cl_limite']) : '';
$idMoneda = isset($_POST['idMoneda']) ? htmlentities($_POST['idMoneda']) : '';
$idEstado = isset($_POST['idEstado']) ? htmlentities($_POST['idEstado']) : '';
$cl_doc_cedula = isset($_FILES['cl_doc_cedula']) ? htmlentities($_FILES['cl_doc_cedula']['name']) : '';
$cl_doc_form = isset($_FILES['cl_doc_form']) ? htmlentities($_FILES['cl_doc_form']['name']) : '';
$cl_doc_otro = isset($_FILES['cl_doc_otro']) ? htmlentities($_FILES['cl_doc_otro']['name']) : '';
$action = isset($_POST['accion']) ? intval(htmlentities($_POST['accion'])) : 1;

$imagenes = ['image/jpeg', 'image/png'];

//$dir_subida = $_SERVER['DOCUMENT_ROOT'].'encomiendas/archivos/';

$dir_subida = 'archivos/';

// agregar nuevo

if ($action == 2) {

    $doc = 'cl_doc_cedula';

    //echo '<p>'.$_FILES[$doc]['type'].'</p>';
    //echo '<p>'.$_FILES[$doc]['name'].'</p>';
    //echo '<p>'.$_FILES[$doc]['size'].'</p>';

    //$fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

    //move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);



    if (($_FILES[$doc]['size']) > 0) {


        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {



            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }


    $doc = 'cl_doc_form';


    if (($_FILES[$doc]['size']) > 0) {


        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {



            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }

    $doc = 'cl_doc_otro';


    if (($_FILES[$doc]['size']) > 0) {


        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {



            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }



    $sql = "INSERT INTO cliente VALUES
  (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $cl_nombre, $cl_apellido, $cl_fechaNacimiento, $idPais, $cl_provincia,
        $cl_ciudad, $cl_direccion, $cl_tlf, $cl_email, $cl_identidad, $idTipoIdentidad,
        $cl_fechaEmision, $cl_fechaCaducidad, $cl_nacionalidad, $cl_facebook, $cl_whatsapp,
        $cl_telegram, $cl_limite, $idMoneda, $idEstado, $cl_doc_cedula, $cl_doc_form,
        $cl_doc_otro

    ));

    //echo json_encode(array("data" => "ok"));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
        $of = 1;   //para saber si el proceso fue exitoso usando el formularo de varias vistas
    } else {

        $_SESSION['msg'] = 'Proceso Fallido, Por favor colocar los formatos jpg, png, jpeg';
        $_SESSION['control'] = false;
        $of = 2;   //para saber si el proceso no fue exitoso usando el formularo de varias vistas
    }

    if (isset($_POST['origenFormulario'])) {


        if ($of == 1) {

            echo json_encode(array("data" => 1));
        } else {

            echo json_encode(array("data" => 2));
        }
    } else {

        header("Location:cliente.php");
    }
}

//mostrar todos

if ($action == 1) {

    $sql = "SELECT u.idCliente, u.cl_nombre, u.cl_apellido, u.cl_identidad,
    u.cl_tlf, u.cl_email, e.estado 
    FROM cliente AS u JOIN estado AS e ON u.idEstado = e.idEstado ";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $outPut = array();

    foreach ($resultado as $row) {

        if ($row["estado"] == "Activo") {
            $est = '<span class="badge bg-success" >' . $row["estado"] . '</span>';
        } else {
            $est = '<span class="badge bg-warning" >' . $row["estado"] . '</span>';
        }

        $permisoActualizar = [1, 4];

        if (in_array($_SESSION["rolUsuario"], $permisoActualizar)) {

            $edicion = '<span class="badge bg-primary editar" id=' . $row["idCliente"] . '> Editar</span>';
        } else {

            $edicion = '';
        }

        if ($_SESSION["rolUsuario"] == 1) {

            $eliminacion = '<span class="badge bg-danger borrar" id=' . $row["idCliente"] . '> Borrar</span>';
        } else {

            $eliminacion = '';
        }

        $ver = '<span class="badge bg-secondary ver" id=' . $row["idCliente"] . '>archivos</span>';

        $subArray = array(

            "id" => $row["idCliente"],
            "Nombre" => $row["cl_nombre"],
            "Apellido" => $row["cl_apellido"],
            "Identificacion" => $row["cl_identidad"],                     
            "Status" => $est,
            "Edit" => $edicion,
            "Del" => $eliminacion,
            "Ver" => $ver,
        );

        $outPut[] = $subArray;
    }

    echo json_encode(array("data" => $outPut));
}

// recuperar por su id

if ($action == 3) {

    $sql = "SELECT * FROM cliente WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    $resultado = $sentencia->fetchAll();

    $_SESSION['cliente'] = $resultado;

    echo json_encode(array("data" => $resultado));
}

//borrar

if ($action == 5) {

    $sql = "DELETE FROM cliente WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    echo json_encode(array("data" => "ok"));
}

//actualizar

if ($action == 4) {

    $sql = "SELECT * FROM cliente WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array($idCliente));

    $resultado = $sentencia->fetchAll();

    if ($cl_doc_cedula =="") {

        $cl_doc_cedula = $resultado[0]['cl_doc_cedula'] ;
    }

    if ($cl_doc_form =="") {
        
        $cl_doc_form = $resultado[0]['cl_doc_form'] ;
    }

    if ($cl_doc_otro =="") {
        
        $cl_doc_otro = $resultado[0]['cl_doc_otro'] ;
    }
   
    
    //***************************************//

    $doc = 'cl_doc_cedula';

    if (($_FILES[$doc]['size']) > 0) {

        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {

            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }

    $doc = 'cl_doc_form';

    if (($_FILES[$doc]['size']) > 0) {

        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {

            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }

    $doc = 'cl_doc_otro';

    if (($_FILES[$doc]['size']) > 0) {

        if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

            $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

            move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
        } else {

            $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

            header("Location:cliente.php");

            exit();
        }
    }

    $sql = "UPDATE cliente SET cl_nombre=?, cl_apellido=?, cl_fechaNacimiento=?,
    idPais=?, cl_provincia=?, cl_ciudad=?, cl_direccion=?, cl_tlf=?, cl_email=?,
    cl_identidad=?, idTipoIdentidad=?, cl_fechaEmision=?, cl_fechaCaducidad=?,
    cl_nacionalidad=?, cl_facebook=?, cl_whatsapp=?, cl_telegram=?, cl_limite=?,
    idMoneda=?, idEstado=?, cl_doc_cedula=?, cl_doc_form=?, cl_doc_otro=?

  WHERE idCliente = ?";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $cl_nombre, $cl_apellido, $cl_fechaNacimiento, $idPais, $cl_provincia, $cl_ciudad,
        $cl_direccion, $cl_tlf, $cl_email, $cl_identidad, $idTipoIdentidad, $cl_fechaEmision,
        $cl_fechaCaducidad, $cl_nacionalidad, $cl_facebook, $cl_whatsapp, $cl_telegram,
        $cl_limite, $idMoneda, $idEstado, $cl_doc_cedula, $cl_doc_form, $cl_doc_otro, $idCliente,

    ));

    echo json_encode(array("data" => "ok"));
}

// agregar nuevo foto

if ($action == 6) {



    if ($_FILES['cl_doc_cedula']['size'] == 0 && !base64_decode($_POST['mydata'], true)) {

        $_SESSION['msgArchivo'] = 'Por favor seleccionar Foto o cargar cedula uno de los dos';

        header("Location:clienteFoto.php");

        exit();
    }

    if ($_FILES['cl_doc_cedula']['size'] > 0 && base64_decode($_POST['mydata'], true)) {

        $_SESSION['msgArchivo'] = 'Por favor seleccionar Foto o cargar cedula uno de los dos';

        header("Location:clienteFoto.php");

        exit();
    }



    if ($_FILES['cl_doc_cedula']['size'] > 0) {

        $doc = 'cl_doc_cedula';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {


                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:clienteFoto.php");

                exit();
            }
        }
    }

    if (base64_decode($_POST['mydata'], true)) {

        $encoded_data = $_POST['mydata'];
        $binary_data = base64_decode($encoded_data);
        $filename = 'pic_' . date('YmdHis') . '.jpeg';
        $miruta = 'archivos/' . $filename;

        // save to server (beware of permissions)
        $result = file_put_contents($miruta, $binary_data);

        if (!$result) {

            die("Could not save image!  Check file permissions.");

            $_SESSION['msgArchivo'] = 'proceso fallido, imagen no cargada';
        } else {

            $_SESSION['msgArchivo'] = 'proceso exitoso, imagen cargada';
            $cl_doc_cedula = $filename;
        }
    }

    if ($_FILES['cl_doc_form']['size'] > 0) {

        $doc = 'cl_doc_form';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {



                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:clienteFoto.php");

                exit();
            }
        }
    }

    if ($_FILES['cl_doc_otro']['size'] > 0) {

        $doc = 'cl_doc_otro';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {



                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:clienteFoto.php");

                exit();
            }
        }
    }



    $sql = "INSERT INTO cliente VALUES
  (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $cl_nombre, $cl_apellido, $cl_fechaNacimiento, $idPais, $cl_provincia,
        $cl_ciudad, $cl_direccion, $cl_tlf, $cl_email, $cl_identidad, $idTipoIdentidad,
        $cl_fechaEmision, $cl_fechaCaducidad, $cl_nacionalidad, $cl_facebook, $cl_whatsapp,
        $cl_telegram, $cl_limite, $idMoneda, $idEstado, $cl_doc_cedula, $cl_doc_form,
        $cl_doc_otro

    ));

    //echo json_encode(array("data" => "ok"));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
        $of = 1;   //para saber si el proceso fue exitoso usando el formularo de varias vistas
    } else {

        $_SESSION['msg'] = 'Proceso Fallido, Por favor colocar los formatos jpg, png, jpeg';
        $_SESSION['control'] = false;
        $of = 2;   //para saber si el proceso no fue exitoso usando el formularo de varias vistas
    }

    if (isset($_POST['origenFormulario'])) {


        if ($of == 1) {

            echo json_encode(array("data" => 1));
        } else {

            echo json_encode(array("data" => 2));
        }
    } else {

        header("Location:clienteFoto.php");
    }
}

// agregar nuevo foto en multiples vistas

if ($action == 7) {



    if ($_FILES['cl_doc_cedula']['size'] == 0 && !base64_decode($_POST['mydata'], true)) {

        $_SESSION['msgArchivo'] = 'Por favor seleccionar Foto o cargar cedula uno de los dos';

        header("Location:giroMultiplesVistas.php");

        exit();
    }

    if ($_FILES['cl_doc_cedula']['size'] > 0 && base64_decode($_POST['mydata'], true)) {

        $_SESSION['msgArchivo'] = 'Por favor seleccionar Foto o cargar cedula uno de los dos';

        header("Location:giroMultiplesVistas.php");

        exit();
    }



    if ($_FILES['cl_doc_cedula']['size'] > 0) {

        $doc = 'cl_doc_cedula';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {


                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:giroMultiplesVistas.php");

                exit();
            }
        }
    }

    if (base64_decode($_POST['mydata'], true)) {

        $encoded_data = $_POST['mydata'];
        $binary_data = base64_decode($encoded_data);
        $filename = 'pic_' . date('YmdHis') . '.jpeg';
        $miruta = 'archivos/' . $filename;

        // save to server (beware of permissions)
        $result = file_put_contents($miruta, $binary_data);

        if (!$result) {

            die("Could not save image!  Check file permissions.");

            $_SESSION['msgArchivo'] = 'proceso fallido, imagen no cargada';
        } else {

            $_SESSION['msgArchivo'] = 'proceso exitoso, imagen cargada';
            $cl_doc_cedula = $filename;
        }
    }

    if ($_FILES['cl_doc_form']['size'] > 0) {

        $doc = 'cl_doc_form';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {



                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:giroMultiplesVistas.php");

                exit();
            }
        }
    }

    if ($_FILES['cl_doc_otro']['size'] > 0) {

        $doc = 'cl_doc_otro';

        if (($_FILES[$doc]['size']) > 0) {


            if (in_array($_FILES[$doc]['type'], $imagenes) and $_FILES[$doc]['size'] <= 500000) {

                $fichero_subido = $dir_subida . basename($_FILES[$doc]['name']);

                move_uploaded_file($_FILES[$doc]['tmp_name'], $fichero_subido);
            } else {



                $_SESSION['msgArchivo'] = 'Por favor colocar los formatos jpg, 
            png, jpeg o tamaño menos de 500kb';

                header("Location:giroMultiplesVistas.php");

                exit();
            }
        }
    }



    $sql = "INSERT INTO cliente VALUES
  (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $sentencia = $mbd->prepare($sql);

    $sentencia->execute(array(

        $cl_nombre, $cl_apellido, $cl_fechaNacimiento, $idPais, $cl_provincia,
        $cl_ciudad, $cl_direccion, $cl_tlf, $cl_email, $cl_identidad, $idTipoIdentidad,
        $cl_fechaEmision, $cl_fechaCaducidad, $cl_nacionalidad, $cl_facebook, $cl_whatsapp,
        $cl_telegram, $cl_limite, $idMoneda, $idEstado, $cl_doc_cedula, $cl_doc_form,
        $cl_doc_otro

    ));

    //echo json_encode(array("data" => "ok"));

    $cantidadFilas = $sentencia->rowCount();

    if ($cantidadFilas = 1) {

        $_SESSION['msg'] = 'Proceso Exitoso';
        $_SESSION['control'] = true;
    } else {

        $_SESSION['msg'] = 'Proceso Fallido, Por favor colocar los formatos jpg, png, jpeg';
        $_SESSION['control'] = false;
    }

    header("Location:giroMultiplesVistas.php");
}
