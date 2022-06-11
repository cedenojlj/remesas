// comienzo del jquery

$(document).ready(function () {
  //tabla con datatables ok

  var giroTabla = $("#giro_tablaUser").DataTable({
    ajax: {
      url: "giroDataUsuario.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Fecha" },
      { data: "Monto" },
      { data: "Moneda" },
      { data: "Identificacion" },
      { data: "Usuario" },
      { data: "Status" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  

  //Termina jquery
});
