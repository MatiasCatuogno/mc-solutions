const expresiones = {
 id: /^\d{1,255}$/,
 pin: /^\d{4,6}$/,
 nombre: /^[a-zA-ZÀ-ÿ\s]{1,30}$/,
 password: /^[a-zA-ZÀ-ÿ0-9]{1,30}$/,
 telefono: /^\+?\d{8,15}$/,
 mail: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
};

const campos = {
 id: false,
 pin: false,
 nombre: false,
 password: false,
 telefono: false,
 mail: false,
};

const inputId = document.getElementById("id");
const inputPin = document.getElementById("pin");
const inputNombre = document.getElementById("nombre");
const inputPassword = document.getElementById("password");
const inputTelefono = document.getElementById("telefono");
const inputMail = document.getElementById("mail");

const form = document.getElementById("form");

const validarId = (evento) => {
 if (expresiones.id.test(evento.target.value)) {
  document.querySelector("#grupo_id input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_id p").classList.remove("formulario_input_error_activo");

  campos.id = true;
 } else {
  document.querySelector("#grupo_id input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_id p").classList.add("formulario_input_error_activo");

  campos.id = false;
 }
};

const validarPin = (evento) => {
 if (expresiones.pin.test(evento.target.value)) {
  document.querySelector("#grupo_pin input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_pin p").classList.remove("formulario_input_error_activo");

  campos.pin = true;
 } else {
  document.querySelector("#grupo_pin input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_pin p").classList.add("formulario_input_error_activo");

  campos.pin = false;
 }
};

const validarNombre = (evento) => {
 if (expresiones.nombre.test(evento.target.value)) {
  document.querySelector("#grupo_nombre input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_nombre p").classList.remove("formulario_input_error_activo");

  campos.nombre = true;
 } else {
  document.querySelector("#grupo_nombre input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_nombre p").classList.add("formulario_input_error_activo");

  campos.nombre = false;
 }
};

const validarPassword = (evento) => {
 if (expresiones.password.test(evento.target.value)) {
  document.querySelector("#grupo_password input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_password p").classList.remove("formulario_input_error_activo");

  campos.password = true;
 } else {
  document.querySelector("#grupo_password input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_password p").classList.add("formulario_input_error_activo");

  campos.password = false;
 }
};

const validarTelefono = (evento) => {
 if (expresiones.telefono.test(evento.target.value)) {
  document.querySelector("#grupo_telefono input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_telefono p").classList.remove("formulario_input_error_activo");

  campos.telefono = true;
 } else {
  document.querySelector("#grupo_telefono input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_telefono p").classList.add("formulario_input_error_activo");

  campos.telefono = false;
 }
};

const validarMail = (evento) => {
 if (expresiones.mail.test(evento.target.value)) {
  document.querySelector("#grupo_mail input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_mail p").classList.remove("formulario_input_error_activo");

  campos.mail = true;
 } else {
  document.querySelector("#grupo_mail input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_mail p").classList.add("formulario_input_error_activo");

  campos.mail = false;
 }
};

inputId.addEventListener("keyup", validarId);
inputPin.addEventListener("keyup", validarPin);
inputNombre.addEventListener("keyup", validarNombre);
inputPassword.addEventListener("keyup", validarPassword);
inputTelefono.addEventListener("keyup", validarTelefono);
inputMail.addEventListener("keyup", validarMail);

inputId.addEventListener("blur", validarId);
inputPin.addEventListener("blur", validarPin);
inputNombre.addEventListener("blur", validarNombre);
inputPassword.addEventListener("blur", validarPassword);
inputTelefono.addEventListener("blur", validarTelefono);
inputMail.addEventListener("blur", validarMail);

form.addEventListener("submit", (e) => {
 e.preventDefault();

 if (campos.id && campos.pin && campos.nombre && campos.password && campos.telefono && campos.mail) {
  form.submit();
  form.reset();
 } else {
  console.log("Los Datos Están Incorrectos");

  document.getElementById("formulario_mensaje").classList.add("formulario_mensaje_error_activo");

  setTimeout(() => {
   document.getElementById("formulario_mensaje").classList.remove("formulario_mensaje_error_activo");
  }, 5000);
 }
});