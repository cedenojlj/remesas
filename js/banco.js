
// comienzo del jquery

$(document).ready(function () {

  
  //tabla con datatables

  var bancoTabla = $("#banco_tabla").DataTable({
    ajax: {
      url: "bancoData.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Banco" },
      { data: "Pais" },
      { data: "Ciudad" },      
      { data: "Edit" },
      { data: "Del" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de usuario para editar

  $("#banco_tabla").on("click", ".editar", function () {
    $("#bancoModal").modal("show");

    $.ajax({
      type: "post",
      url: "bancoData.php",
      data: {
        accion: 3,
        idBanco: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {
        //Para recuperar todos los datos del usuario menos los input select

        $($("#frmBancoModal input")).each(function (index, element) {
          if (element.id == "accion") {
            element.value = 4;
          } else {
            element.value = res.data[0][element.id];
          }
        });

        //Para recuperar el valor del tipo de rol

        $($("#idPaism option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idPais)) {
            element.selected = true;
          }
        });      

      },
    });
  });

  //Para actualizar usuarios

  $("#frmBancoModal").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "bancoData.php",
      data: $("#frmBancoModal").serialize(),
      dataType: "json",
      success: function (response) {
        bancoTabla.ajax.reload();
        $("#frmBancoModal")[0].reset();
        $("#bancoModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
    
  });

  //activar el formulario de usuario para eliminar

  $("#banco_tabla").on("click", ".borrar", function () {
    $.ajax({
      type: "post",
      url: "bancoData.php",
      data: {
        accion: 5,
        idBanco: $(this).prop("id"),
      },
      dataType: "json",
      success: function (res) {
        bancoTabla.ajax.reload();
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //Termina jquery
});
