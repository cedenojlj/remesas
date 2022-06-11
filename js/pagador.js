
// comienzo del jquery

$(document).ready(function () {

  
  //tabla con datatables

  var pagadorTabla = $("#pagador_tabla").DataTable({
    ajax: {
      url: "pagadorData.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Nombre" },
      { data: "Pais" },
      { data: "Ciudad" },
      { data: "Empresa" },  
      { data: "Status" },     
      { data: "Edit" },
      { data: "Del" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de pagador para editar

  $("#pagador_tabla").on("click", ".editar", function () {
    $("#pagadorModal").modal("show");

    $.ajax({
      type: "post",
      url: "pagadorData.php",
      data: {
        accion: 3,
        idPagador: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {
        //Para recuperar todos los datos del pagador menos los input select      
      
        $($("#frmPagadorModal input")).each(function (index, element) {
          if (element.id == "accion") {

            element.value = 4;

          } else if(element.id !='cl_doc_cedula' && element.id !='cl_doc_form' && element.id !='cl_doc_otro'){

            element.value = res.data[0][element.id];             
          }
        });
        
        $('#idPagadores').val(res.data[0].idPagador);

        //Para recuperar el valor 

        $($("#idPaispa option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idPais)) {
            element.selected = true;
          }
        });    
                     

        $($("#idMonedapa option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idMoneda)) {
            element.selected = true;
          }
        }); 

        $($("#idEstadopa option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idEstado)) {
            element.selected = true;
          }
        }); 

        $($("#idTipoComision option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoComision)) {
            element.selected = true;
          }
        }); 

        $($("#idTipoEmpresa option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoEmpresa)) {
            element.selected = true;
          }
        }); 


      },
    });
  });

  //Para actualizar pagadors

  $("#frmPagadorModal").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "pagadorData.php",
      data: new FormData($("#frmPagadorModal")[0]),
      cache:false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function (response) {
        pagadorTabla.ajax.reload();
        $("#frmPagadorModal")[0].reset();
        $("#pagadorModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //activar el formulario de pagador para eliminar

  $("#pagador_tabla").on("click", ".borrar", function () {
    $.ajax({
      type: "post",
      url: "pagadorData.php",
      data: {
        accion: 5,
        idPagador: $(this).prop("id"),
      },
      dataType: "json",
      success: function (res) {
        pagadorTabla.ajax.reload();
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //Termina jquery
});
