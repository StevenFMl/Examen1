//aqui va a estar el codigo de usuarios.model.js

function init() {
    $("#form_estacion").on("submit", function (e) {
      guardaryeditar(e);
    });
  }
  
  $().ready(() => {
    todos();
  });
  
  var todos = () => {
    var html = "";
    $.get("../../Controllers/estacion.controller.php?op=todos", (res) => {
      console.log(res);
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Nombre}</td>
                  <td>${valor.Ciudad}</td>
                  <td>${valor.Capacidad}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${
                valor.ID_estacion
              })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${
                valor.ID_estacion
              })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${
                valor.ID_estacion
              })'>Ver</button>
              </td></tr>
                  `;
      });
      $("#tabla_estaciones").html(html);
    });
  };
  
  var guardaryeditar = (e) => {
    e.preventDefault();
    var dato = new FormData($("#form_estacion")[0]);
    var ruta = "";
    var ID_estacion = document.getElementById("ID_estacion").value;
    if (ID_estacion > 0) {
      ruta = "../../Controllers/estacion.controller.php?op=actualizar";
    } else {
      ruta = "../../Controllers/estacion.controller.php?op=insertar";
    }
    $.ajax({
      url: ruta,
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: function (res) {
        res = JSON.parse(res);
        if (res == "ok") {
          Swal.fire("Estaciones", "Registrado con éxito", "success");
          todos();
          limpia_Cajas();
        } else {
          Swal.fire("Estaciones", "Error al guardo, intente mas tarde", "error");
        }
      },
    });
  };
  
  var editar = (ID_estacion)=>{
  
    $.post(
      "../../Controllers/estacion.controller.php?op=uno",
      { ID_estacion: ID_estacion },
      (res) => {
        res = JSON.parse(res);
        $("#ID_estacion").val(res.ID_estacion);
        $("#Nombre").val(res.Nombre);
        $("#Ciudad").val(res.Ciudad);
        $("#Capacidad").val(res.Capacidad);
    
      }
    );
    $("#Modal_Estacion").modal("show");
  }
  
  var eliminar = (ID_estacion) => {
    Swal.fire({
      title: "Estaciones",
      text: "Esta seguro de eliminar la Estacion",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/estacion.controller.php?op=eliminar",
          { ID_estacion: ID_estacion },
          (res) => {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("estaciones", "Estacion Eliminado", "success");
              todos();
            } else {
              Swal.fire("Error", res, "error");
            }
          }
        );
      }
    });
  
    limpia_Cajas();
  };
  
  var limpia_Cajas = () => {
    document.getElementById("Nombre").value = "";
    document.getElementById("Ciudad").value = "";  
    document.getElementById("Capacidad").value = "";
    $("#Modal_Estacion").modal("hide");
  };
  init();