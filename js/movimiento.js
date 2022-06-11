// comienzo del jquery

$(document).ready(function () {


  $("#frmMovimientoLista").submit(function (e) {
    e.preventDefault();
    
    let idCuenta = $("#idCuentamo").val();
    let inicio = $("#inicio").val();
    let fin = $("#fin").val();

    if (idCuenta == "" || inicio == "" || fin == "") {

      Swal.fire("Proceso Fallido", "Llene todos los datos", "info");

    } else {

      movimientoTabla.ajax.url('movimientoData.php?idCuenta='+ idCuenta+'&inicio='+inicio+'&fin='+fin+'&accion=9').load();    

      Swal.fire("Proceso Exitoso", "", "success");
    }
  });

  var movimientoTabla = $("#movimiento_tabla").DataTable({
    ajax: {
      url: "movimientoData.php",      
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Fecha" },
      { data: "Referencia" },
      { data: "Entrada" },
      { data: "Salida" },
      { data: "Saldo" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });
 

  //Termina jquery
});
