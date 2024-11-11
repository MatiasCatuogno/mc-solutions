const expresiones = {
 usuario: /^[a-zA-ZÀ-ÿ0-9]{1,30}$/,
 password: /^[a-zA-ZÀ-ÿ0-9]{1,30}$/,
};

const campos = {
 usuario: false,
 password: false,
};

const inputUsuario = document.getElementById("usuario");
const inputPassword = document.getElementById("password");

const form = document.getElementById("form");

const validarUsuario = (evento) => {
 if (expresiones.usuario.test(evento.target.value)) {
  document.querySelector("#grupo_usuario input").classList.remove("formulario_input_con_error");
  document.querySelector("#grupo_usuario p").classList.remove("formulario_input_error_activo");

  campos.usuario = true;
 } else {
  document.querySelector("#grupo_usuario input").classList.add("formulario_input_con_error");
  document.querySelector("#grupo_usuario p").classList.add("formulario_input_error_activo");

  campos.usuario = false;
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

inputUsuario.addEventListener("keyup", validarUsuario);
inputPassword.addEventListener("keyup", validarPassword);

inputUsuario.addEventListener("blur", validarUsuario);
inputPassword.addEventListener("blur", validarPassword);

form.addEventListener("submit", (e) => {
 e.preventDefault();

 if (campos.usuario && campos.password) {
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