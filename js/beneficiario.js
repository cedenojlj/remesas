
// comienzo del jquery

$(document).ready(function () {

  
  //tabla con datatables

  var beneficiarioTabla = $("#beneficiario_tabla").DataTable({
    ajax: {
      url: "beneficiarioData.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Nombre" },
      { data: "Apellido" },
      { data: "Identificacion" },  
      { data: "Status" },     
      { data: "Edit" },
      { data: "Del" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de beneficiario para editar

  $("#beneficiario_tabla").on("click", ".editar", function () {
    $("#beneficiarioModal").modal("show");

    $.ajax({
      type: "post",
      url: "beneficiarioData.php",
      data: {
        accion: 3,
        idBeneficiario: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {
        //Para recuperar todos los datos del beneficiario menos los input select

      
        $($("#frmBeneficiarioModal input")).each(function (index, element) {
          if (element.id == "accion") {
            element.value = 4;
          } else {
            element.value = res.data[0][element.id];
          }
        });

        //Para recuperar el valor 

        $($("#idPaisbe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idPais)) {
            element.selected = true;
          }
        });    
        
        $($("#idTipoIdentidadbe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoIdentidad)) {
            element.selected = true;
          }
        });  

        $($("#idTipoCuentabe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoCuenta)) {
            element.selected = true;
          }
        }); 

        $($("#idBancobe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idBanco)) {
            element.selected = true;
          }
        }); 

        $($("#idMonedabe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idMoneda)) {
            element.selected = true;
          }
        }); 

        $($("#idEstadobe option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idEstado)) {
            element.selected = true;
          }
        }); 


      },
    });
  });

  //Para actualizar beneficiarios

  $("#frmBeneficiarioModal").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "beneficiarioData.php",
      data: $("#frmBeneficiarioModal").serialize(),
      dataType: "json",
      success: function (response) {
        beneficiarioTabla.ajax.reload();
        $("#frmBeneficiarioModal")[0].reset();
        $("#beneficiarioModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //activar el formulario de beneficiario para eliminar

  $("#beneficiario_tabla").on("click", ".borrar", function () {
    $.ajax({
      type: "post",
      url: "beneficiarioData.php",
      data: {
        accion: 5,
        idBeneficiario: $(this).prop("id"),
      },
      dataType: "json",
      success: function (res) {
        beneficiarioTabla.ajax.reload();
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });


  $('#frmBeneficiarioVista').submit(function (e) { 
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "beneficiarioData.php",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {

        if (res.data==1) {
          
          $('#msgBeneficiario').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
          '<strong> Estatus de la Operación </strong>Proceso Exitoso'+
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
         
          $('#frmBeneficiarioVista').removeClass('was-validated');
          $('#frmBeneficiarioVista')[0].reset();

        } else {
          
          $('#msgBeneficiario').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
          '<strong> Estatus de la Operación </strong>Proceso Fallido'+
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
      }
    });
    
  });

  //Termina jquery
});
