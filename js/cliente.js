
// comienzo del jquery

$(document).ready(function () {

  
  //tabla con datatables

  var clienteTabla = $("#cliente_tabla").DataTable({
    ajax: {
      url: "clienteData.php",
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
      { data: "Ver" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de cliente para editar

  $("#cliente_tabla").on("click", ".editar", function () {
    $("#clienteModal").modal("show");

    $.ajax({
      type: "post",
      url: "clienteData.php",
      data: {
        accion: 3,
        idCliente: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {
        //Para recuperar todos los datos del cliente menos los input select

       $("#footerCliente").html('');

        console.log(res.data[0]);
      
        $($("#frmClienteModal input")).each(function (index, element) {
          if (element.id == "accion") {

            element.value = 4;

          } else if(element.id !='cl_doc_cedula' && element.id !='cl_doc_form' && element.id !='cl_doc_otro'){

            element.value = res.data[0][element.id];             
          }
        });

        //Para recuperar el valor 

        $($("#idPaiscl option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idPais)) {
            element.selected = true;
          }
        });    
        
        $($("#idTipoIdentidadcl option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoIdentidad)) {
            element.selected = true;
          }
        });          

        $($("#idMonedacl option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idMoneda)) {
            element.selected = true;
          }
        }); 

        $($("#idEstadocl option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idEstado)) {
            element.selected = true;
          }
        }); 


        //para colocar los link de los soportes cargados en el sistema
        
                  
        if (res.data[0].cl_doc_cedula!="") {

         $("#footerCliente").append('<div class="col"><a href="archivos/'+res.data[0].cl_doc_cedula+'" target="_blank">Ver Cedula</a></div>');
          
        }

        if (res.data[0].cl_doc_form!="") {

          $("#footerCliente").append('<div class="col"><a href="archivos/'+res.data[0].cl_doc_form+'" target="_blank">Ver Formulario</a></div>');

        }

        if (res.data[0].cl_doc_otro!="") {

          $("#footerCliente").append('<div class="col"><a href="archivos/'+res.data[0].cl_doc_otro+'" target="_blank">Ver Otro</a></div>');

        }


      },
    });
  });

  //Para actualizar clientes

  $("#frmClienteModal").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "clienteData.php",
      data: new FormData($("#frmClienteModal")[0]),
      cache:false,
      contentType:false,
      processData:false,
      dataType: "json",
      success: function (response) {
        clienteTabla.ajax.reload();
        $("#frmClienteModal")[0].reset();
        $("#clienteModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "Archivos con formatos jpg, png, jpeg o tamaño menos de 500kb", "info");
      },
    });
  });

  //activar el formulario de cliente para eliminar

  $("#cliente_tabla").on("click", ".borrar", function () {
    $.ajax({
      type: "post",
      url: "clienteData.php",
      data: {
        accion: 5,
        idCliente: $(this).prop("id"),
      },
      dataType: "json",
      success: function (res) {
        clienteTabla.ajax.reload();
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });



  $('#frmClienteVista').submit(function (e) { 
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "clienteData.php",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (res) {

        if (res.data==1) {
          
          $('#msgCliente').append('<div class="alert alert-success alert-dismissible fade show" role="alert">'+
          '<strong> Estatus de la Operación </strong>Proceso Exitoso'+
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
         
          $('#frmClienteVista').removeClass('was-validated');
          $('#frmClienteVista')[0].reset();

        } else {
          
          $('#msgCliente').append('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
          '<strong> Estatus de la Operación </strong>Proceso Fallido'+
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
      }
    });
    
  });


   //activar el formulario de cliente para editar

   $("#cliente_tabla").on("click", ".ver", function () {
    $("#archivosModal").modal("show");

    $.ajax({
      type: "post",
      url: "clienteData.php",
      data: {
        accion: 3,
        idCliente: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) { 

        if (res.data[0].cl_doc_cedula!="") {
          $('#docCedula').attr('src', 'archivos/'+res.data[0].cl_doc_cedula);
          $('#docCedulaLink').attr('href', 'archivos/'+res.data[0].cl_doc_cedula);
        }

        if (res.data[0].cl_doc_form!="") {
          $('#docDos').attr('src', 'archivos/'+res.data[0].cl_doc_form);
          $('#docDosLink').attr('href', 'archivos/'+res.data[0].cl_doc_form);
        }

        if (res.data[0].cl_doc_otro!="") {
          $('#docTres').attr('src', 'archivos/'+res.data[0].cl_doc_otro);
          $('#docTresLink').attr('href', 'archivos/'+res.data[0].cl_doc_otro);

        }        
      },
    });
  });

  //Termina jquery
});
