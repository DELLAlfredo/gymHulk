const form = document.getElementById("formulario");
var url = form.getAttribute("action");
url = url.slice(0, url.lastIndexOf("/"));

const inputID = document.getElementById("ID");
const inputNombre = document.getElementById("Nombre");
const inputPrecio = document.getElementById("Precio");
const inputDescripcion = document.getElementById("Descripcion");
var checked = "alta";
const btnGuardar = document.getElementById("Guardar")
const btnBorrar = document.getElementById("Borrar")

function handleClick(myRadio) {
  switch (myRadio.id) {
    case "alta":
      form.setAttribute("action", url + "/guardar");
      setAllInputsDisabled(false);
      inputID.disabled = true;
      checked = "alta";
      btnGuardar.disabled = false
      btnBorrar.disabled =true
      break;
    case "baja":
      form.setAttribute("action", url + "/baja");
      setAllInputsDisabled(true);
      inputID.disabled = false;
      inputID.value = "";
      checked = "baja";
      btnGuardar.disabled = true
      btnBorrar.disabled =false
      break;
    case "cambio":
      inputID.value = "";
      form.setAttribute("action", url + "/cambio");
      setAllInputsDisabled(false);
      checked = "cambio";
     
      btnGuardar.disabled = false
      btnBorrar.disabled =true
      break;
  }

  function setAllInputsDisabled(status) {
    inputID.disabled = status;
    inputNombre.disabled = status;
    inputPrecio.disabled = status;
    inputDescripcion.disabled = status;
  }
}