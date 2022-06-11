// comienzo del jquery

$(document).ready(function () {
  //tabla con datatables ok

  var giroTabla = $("#giro_tabla").DataTable({
    ajax: {
      url: "giroData.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Fecha" },
      { data: "Importe" },
      { data: "Moneda" },
      { data: "Corresponsal" },
      { data: "Guia" },
      { data: "Status" },
      { data: "Edit" },
      { data: "Imp" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de giro para editar ok

  $("#giro_tabla").on("click", ".editar", function () {
    $("#giroModal").modal("show");

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: {
        accion: 8,
        idGiro: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {        

        //Para recuperar todos los datos del giro input

        //$('#idGiro').val(idGiro);

        $($("#frmGiroModal input")).each(function (index, element) {
          if (element.id == "accion") {
            element.value = 7;
          } else {
            element.value = res.data[0][element.id];
          }
        });

        //para recuperar los valores de los select
        //element.id es el id del select
        //element.name es el nombre del campo de la base de datos del select
        //res es la respuesta del servidor a la solicitud de ajax

        $($("#frmGiroModal select")).each(function (index, element) {
          seleccionarOpcion(element.id, element.name, res);
        });
      },
    });
  });

  //Para actualizar giros

  $("#frmGiroModal").submit(function (e) {
    e.preventDefault();

    console.log($("#frmGiroModal").serialize());

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: $("#frmGiroModal").serialize(),
      dataType: "json",
      success: function (response) {
        giroTabla.ajax.reload();
        $("#frmGiroModal")[0].reset();
        $("#giroModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //funcion para seleccionar opcion del select

  function seleccionarOpcion(id, campo, obj) {
    $($("#" + id + " option")).each(function (index, element) {
      if (parseInt(element.value) == parseInt(obj.data[0][campo])) {
        element.selected = true;
      }
    });
  }

  //Termina jquery
});
