function init() {
    $("#form_tren").on("submit", function (e) {
      guardaryeditar(e);
    });
  }
  
  $().ready(() => {
    todos();
  });
  
  var todos = () => {
    var html = "";
    $.get("../../Controllers/trenes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      console.log("res",res);
      $.each(res, (index, valor) => {
        html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Modelo}</td>
                  <td>${valor.Capacidad_pasajeros}</td>
                  <td>${valor.Fecha_fabricacion}</td>
                  <td>${valor.estaciones}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${
                valor.ID_tren
              })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${
                valor.ID_tren
              })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${
                valor.ID_tren
              })'>Ver</button>
              </td></tr>
                  `;
      });
      $("#tabla_trenes").html(html);
    });
  };
  
  var guardaryeditar = (e) => {
    e.preventDefault();
    var dato = new FormData($("#form_tren")[0]);
    var ruta = "";
    var ID_tren = document.getElementById("ID_tren").value;
    if (ID_tren > 0) {
      ruta = "../../Controllers/trenes.controller.php?op=actualizar";
    } else {
      ruta = "../../Controllers/trenes.controller.php?op=insertar";
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
          Swal.fire("Trenes", "Registrado con éxito", "success");
          todos();
          limpia_Cajas();
        } else {
          Swal.fire("Trenes", "Error al guardo, intente mas tarde", "error");
        }
      },
    });
  };
  
  var cargaTrenes = () => {
    return new Promise((resolve, reject) => {
      $.post("../../Controllers/estacion.controller.php?op=todos", (res) => {
        res = JSON.parse(res);
        var html = "";
        $.each(res, (index, val) => {
          html += `<option value="${val.ID_estacion}"> ${val.Nombre}</option>`;
        });
        $("#ID_estacion").html(html);
        resolve();
      }).fail((error) => {
        reject(error);
      });
    });
  };
  
  var editar = async (ID_tren) => {
    await cargaTrenes();
    $.post(
      "../../Controllers/trenes.controller.php?op=uno",
      { ID_tren: ID_tren },
      (res) => {
        res = JSON.parse(res);
        console.log("edit",res);
  
        $("#Marca").val(res.Modelo );
        $("#Capacidad_pasajeros").val(res.Capacidad_pasajeros);
        $("#Fecha_fabricacion").val(res.Fecha_fabricacion);
        $("#estacion").val(res.estaciones);
        $("#ID_tren").val(res.ID_tren);
        $("#ID_estacion").val(res.ID_estacion);
        //document.getElementById("PaisId").value = res.PaisesId;
  
  
        $("#Nombre").val(res.Nombre);
      }
    );
    $("#Modal_trenes").modal("show");
  };
  
  var eliminar = (ID_tren) => {
    Swal.fire({
      title: "Trenes",
      text: "Esta seguro de eliminar el Tren",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Eliminar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.post(
          "../../Controllers/trenes.controller.php?op=eliminar",
          { ID_tren: ID_tren },
          (res) => {
            res = JSON.parse(res);
            if (res === "ok") {
              Swal.fire("Trenes", "Tren Eliminado", "success");
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
    document.getElementById("ID_tren").value = "";
    document.getElementById("Marca").value = "";
    document.getElementById("Capacidad_pasajeros").value = "";
    document.getElementById("Fecha_fabricacion").value = "";
    document.getElementById("ID_estacion").value = "";
    $("#Modal_trenes").modal("hide");
  };
  init();