// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

// comienzo del jquery

$(document).ready(function () {
  $("#idTipoRol").select2({
    placeholder: "tipo de rol",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idPagador").select2({
    placeholder: "Agente",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idPagadormo").select2({
    placeholder: "Agente",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idEstado").select2({
    placeholder: "Estado",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idPais").select2({
    placeholder: "Pais",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idBanco").select2({
    placeholder: "Banco",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idMoneda").select2({
    placeholder: "Moneda",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idClientegi").select2({
    placeholder: "Cliente",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idBeneficiariogi").select2({
    placeholder: "Beneficiario",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idMonedaCobro").select2({
    placeholder: "Beneficiario",
    theme: "bootstrap4",
    tags: true,
  });

  $("#idPagadormo").change(function (e) {
    e.preventDefault();

    data = { idPagador: $("#idPagadormo").val(), accion: 7 };

    $.ajax({
      type: "post",
      url: "movimientoData.php",
      data: data,
      dataType: "json",
      success: function (res) {
        console.log(res);

        $("#idCuentamo").html("");

        $("#idCuentamo").append('<option value="">Seleccione</option>');

        $.each(res.data, function (index, value) {
          $("#idCuentamo").append(
            '<option value="' +
              value.idCuenta +
              '">' +
              value.cu_numCta +
              " " +
              value.mo_codigo +
              " " +
              value.moneda +
              "</option>"
          );
        });
      },
    });
  });

  //datatable para los usuarios

  //tabla de usuarios con datatables

  var usuarioTabla = $("#usuario_tabla").DataTable({
    ajax: {
      url: "usuarioData.php",
      dataSrc: "data",
      type: "POST",
    },
    columns: [
      { data: "id" },
      { data: "Nombre" },
      { data: "Apellido" },
      { data: "Identificacion" },
      { data: "Rol" },
      { data: "Status" },
      { data: "Edit" },
      { data: "Del" },
    ],

    dom: "Bfrtip",

    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });

  //activar el formulario de usuario para editar

  $("#usuario_tabla").on("click", ".editar", function () {
    $("#usuarioModal").modal("show");

    $.ajax({
      type: "post",
      url: "usuarioData.php",
      data: {
        accion: 3,
        idUsuario: $(this).prop("id"),
      },
      dataType: "json",

      success: function (res) {
        //Para recuperar todos los datos del usuario menos los input select

        $($("#frmUsuarioModal input")).each(function (index, element) {
          if (element.id == "accion") {
            element.value = 4;
          } else {
            element.value = res.data[0][element.id];
          }
        });

        //Para recuperar el valor del tipo de rol

        $($("#idTipoRolm option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idTipoRol)) {
            element.selected = true;
          }
        });

        //Para recuperar el valor del agente

        $($("#idPagadorm option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idPagador)) {
            element.selected = true;
          }
        });

        //Para recuperar el valor del estado

        $($("#idEstadom option")).each(function (index, element) {
          if (parseInt(element.value) == parseInt(res.data[0].idEstado)) {
            element.selected = true;
          }
        });
      },
    });
  });

  //Para actualizar usuarios

  $("#frmUsuarioModal").submit(function (e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: "usuarioData.php",
      data: $("#frmUsuarioModal").serialize(),
      dataType: "json",
      success: function (response) {
        usuarioTabla.ajax.reload();
        $("#frmUsuarioModal")[0].reset();
        $("#usuarioModal").modal("hide");
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //activar el formulario de usuario para eliminar

  $("#usuario_tabla").on("click", ".borrar", function () {
    $.ajax({
      type: "post",
      url: "usuarioData.php",
      data: {
        accion: 5,
        idUsuario: $(this).prop("id"),
      },
      dataType: "json",
      success: function (res) {
        usuarioTabla.ajax.reload();
        Swal.fire("Proceso Exitoso", "", "success");
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  //codigos para los giros partes esenciales

  //funcion para calcular el monto a pagar preliminar

  function calculosGiro() {
    let importe = $("#gi_importe").val();
    let monedaEnvio = $("#idMonedaPagogi").val();
    let monedaCobro = $("#idMonedaCobrogi").val();
    let corresponsal = $("#idPagador").val();    


    if (importe != "" && monedaEnvio != "" && monedaCobro != "") {
      const data = {
        gi_importe: importe,
        idMonedaPago: monedaEnvio,
        idMonedaCobro: monedaCobro,
        corresponsal: corresponsal,
        accion: 1,
      };

      $.ajax({
        type: "post",
        url: "giroCalculos.php",
        data: data,
        dataType: "json",
        success: function (res) {
          $("#gi_Total").val(res.data.total.toFixed(2));
          $("#gi_TotalLocal").val(res.data.local.toFixed(2));
          $("#comisionMatriz").val(res.data.comisionMatriz.toFixed(2));          
          $("#comisionAgente").val(res.data.comisionAgente.toFixed(2));
          $("#comisionCorresponsal").val(res.data.comisionCorresponsal.toFixed(2));
          $("#beneficio").val(res.data.beneficio.toFixed(2));
        },
      });
    } else {
      $("#gi_Total").val("");
      $("#gi_TotalLocal").val("");
    }
  }

  //calcula el monto del grito, cuando cambia el monto de la cantidad de la moneda local


  function calculosGiroLocal() {
    let monto = $("#gi_TotalLocal").val();
    let monedaEnvio = $("#idMonedaPagogi").val();
    let monedaCobro = $("#idMonedaCobrogi").val();
    let corresponsal = $("#idPagador").val();    


    if (monto != "" && monedaEnvio != "" && monedaCobro != "") {
      const data = {
        gi_TotalLocal: monto,
        idMonedaPago: monedaEnvio,
        idMonedaCobro: monedaCobro,
        corresponsal: corresponsal,
        accion: 12,
      };

      $.ajax({
        type: "post",
        url: "giroCalculos.php",
        data: data,
        dataType: "json",
        success: function (res) {
          $("#gi_Total").val(res.data.totalCobro.toFixed(2));
          $("#gi_importe").val(res.data.importeEnvio.toFixed(2));
          $("#comisionMatriz").val(res.data.comisionMatriz.toFixed(2));          
          $("#comisionAgente").val(res.data.comisionAgente.toFixed(2));
          $("#comisionCorresponsal").val(res.data.comisionCorresponsal.toFixed(2));
          $("#beneficio").val(res.data.beneficio.toFixed(2));
        },
      });
    } else {
      $("#gi_Total").val("");
      $("#gi_importe").val("");
    }
  }

  //////////////////////////////////

  $("#gi_importe").change(function (e) {
    e.preventDefault(); 

    calculosGiro();
    
  });

  $("#idMonedaPago").change(function (e) {
    e.preventDefault();

    calculosGiro();
  });

  $("#idMonedaCobro").change(function (e) {
    e.preventDefault();

    calculosGiro();
  });

  $("#idPagador").change(function (e) {
    e.preventDefault();

    colocarPaisEnvio();

    colocarMonedaEnvio();

    calculosGiro();
  });

  $("#idBeneficiariogi").change(function (e) {
    e.preventDefault();

    const data = {
      idBeneficiario: $("#idBeneficiariogi").val(),
      accion: 2,
    };

    console.log(data);

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        $("#gi_Banco").val(res.data.banco);
        $("#gi_numCta").val(res.data.cuenta);
        $("#gi_TipoCuenta").val(res.data.tipoCta);
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "", "info");
      },
    });
  });

  $("#frmGiro").submit(function (e) {
    e.preventDefault();

    let vd = VerificarDatos(); // para revisar que todos los datos esten llenos

    if (vd) {
      verificarCliente();
      //verificarCorresponsal();
      //ingresarGiro();
    }
  });

  //funcion para revisar que el cliente tiene o no permiso

  function verificarCliente() {
    const data = {
      idCliente: $("#idClientegi").val(),
      gi_Total: $("#gi_Total").val(),
      idMonedaPago: $("#idMonedaPagogi").val(),
      accion: 3,
    };

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        if (res.data.valor == 1) {

          $($("#idEstadoGiro option")).each(function (index, element) {
            if (parseInt(element.value) == 1) {
              element.selected = true;
            }
          });

          
          if (res.data.permisoGiro) {

            
            verificarCorresponsal();

          } else { 
            
            Swal.fire(
              "Proceso Fallido",
              "Cliente con Documento de Identidad Vencida, solicite documentacion",
              "info"
            );

          }
          


        } else {
          Swal.fire(
            "Proceso Fallido",
            "Cliente Supera el limite establecido, solicite documentacion y cambie el monto",
            "info"
          );

          //setTimeout(window.open("giro.php", "_self"),15000);
          //window.open("giro.php", "_self");

          //alert('cliente supera de los limites');
        }
      },
      error: function (e) {
        Swal.fire("Proceso Fallido", "No se reviso el Cliente", "info");

        $($("#idEstadoGiro option")).each(function (index, element) {
          if (parseInt(element.value) == 4) {
            element.selected = true;
          }
        });
      },
    });
  }

  //funcion para validar que todos los campos esten llenos

  function VerificarDatos() {
    let denegado = false;
    let denegadoSelect = false;

    $($("#frmGiro input")).each(function (index, element) {
      console.log(element.id + " valor: " + element.value);

      if (
        element.id !== "idGiro" &&
        element.value == "" &&
        element.id !== "gi_comentario"
      ) {
        denegado = true;
      }
    });

    $($("#frmGiro select")).each(function (index, element) {
      console.log(element.id + " valor: " + element.value);

      if (element.value == "") {
        denegadoSelect = true;
      }
    });

    if (denegado || denegadoSelect) {
      Swal.fire("Proceso Fallido", "Favor llenar todos los datos", "info");
      return false;
    } else {
      return true;
    }
  }

  //funcion para revisar que el corresponsal si tiene saldo suficiente o no

  function verificarCorresponsal() {
    //alert('dentro de corresponsal');

    const data = {
      corresponsal: $("#idPagador").val(), // corresponsal o pagador
      gi_importe: $("#gi_importe").val(), // monto a trasnferir
      idMonedaPago: $("#idMonedaPagogi").val(), //moneda de envio de la remesa
      accion: 4, //operacion que indica que debe revisar el corresponsal
    };

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        if (res.data.valor == 1) {
          // con fondos suficientes

          let estado = $("#idEstadoGiro").val();

          if (estado == 4) {
            $($("#idEstadoGiro option")).each(function (index, element) {
              if (parseInt(element.value) == 6) {
                element.selected = true;
              }
            });

            //alert("Corresponsal con fondos suficientes, se requiere documentos del cliente");

          } else {
            $($("#idEstadoGiro option")).each(function (index, element) {
              if (parseInt(element.value) == 1) {
                element.selected = true;
              }
            });

            //alert("Corresponsal con fondos suficientes, cliente autorizado");
          }
        } else {
          // sin fondos suficientes

          let estado = $("#idEstadoGiro").val();

          if (estado == 4) {
            $($("#idEstadoGiro option")).each(function (index, element) {
              if (parseInt(element.value) == 7) {
                element.selected = true;
              }
            });

           /*  alert(
              "Corresponsal sin fondos suficientes, se requiere documentos del cliente"
            ); */

          } else {
            $($("#idEstadoGiro option")).each(function (index, element) {
              if (parseInt(element.value) == 5) {
                element.selected = true;
              }
            });

            //alert("Corresponsal sin fondos suficientes, cliente autorizado");
          }
        }

        ingresarGiro();
      },
      error: function (e) {
        Swal.fire(
          "Proceso Fallido",
          "Varificacion del Corresponsal no exitosa",
          "info"
        );

        //alert("Verificacion del Corresponsal no exitosa");
      },
    });
  }

  // para ingresar el giro

  function ingresarGiro() {
    
    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: $("#frmGiro").serialize(),
      dataType: "json",
      success: function (res) {
        
        if (res.data.valor == 1) {
          Swal.fire("Proceso Exitoso", "Ingresado", "success");

          $('#frmGiro').removeClass('was-validated');
          $('#frmGiro')[0].reset();

          $("#btnGiro").addClass("disabled");

          $("#btnFactura").removeClass("disabled");

          $("#btnFactura").attr(
            "href",
            "factura.php?idGiro=" + res.data.idFactura
          );
        } else {
          Swal.fire("Proceso Fallido", "No ingresado", "info");
        }
      },
      error: function (e) {

        Swal.fire("Proceso Fallido", "No ajax ingreso de giro", "info");
      },
    });
  }

  // para colocar la moneda de cobro en el formulario de giro

  function colocarMonedaCliente() {
    const data = {
      idCliente: $("#idClientegi").val(),
      accion: 9,
    };

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        
        $($("#idMonedaCobrogi option")).each(function (index, element) {
          if (parseInt(element.value) == res.data[0].idMoneda) {
            element.selected = true;
          }
        });
      },
    });
  }

  //para colocar la moneda de cobro por cada cambio en cliente

  $("#idClientegi").change(function (e) {
    e.preventDefault();

    $($("#idEstadoGiro option")).each(function (index, element) {
      if (parseInt(element.value) == 1) {
        element.selected = true;
      }
    });

    colocarMonedaCliente();

    calculosGiro();
  });

  // para colocar la moneda de envio en el formulario de giro

  function colocarMonedaEnvio() {
    const data = {
      idPagador: $("#idPagador").val(),
      accion: 10,
    };

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        $($("#idMonedaPagogi option")).each(function (index, element) {
          if (parseInt(element.value) == res.data[0].idMonedaEnvio) {
            element.selected = true;
          }
        });
      },
    });
  }

  $("#idPais").change(function (e) {
    e.preventDefault();
  });

  //colocar el pais segun el corresponsal que se escoge

  function colocarPaisEnvio() {
    const data = {
      idPagador: $("#idPagador").val(),
      accion: 11,
    };

    //alert($("#idPagador").val());

    $.ajax({
      type: "post",
      url: "giroCalculos.php",
      data: data,
      dataType: "json",
      success: function (res) {
        $($("#idPaisgi option")).each(function (index, element) {
          if (parseInt(element.value) == res.data[0].idPais) {
            element.selected = true;
          }
        });
      },
    });
  }

  //se ejecuta cuando se cambia el valor del monto en moneda local
  //que se recibe por el giro

  $('#gi_TotalLocal').change(function (e) { 
    e.preventDefault();
   
    calculosGiroLocal();

  });

  //termina codigo de giros esenciales

  //Termina jquery
});
