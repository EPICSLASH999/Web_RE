console.log('Ha entrado correctamente el disenoCA.js');
document.addEventListener("DOMContentLoaded", function() {
  // Tu código JavaScript aquí

const buttonContainer = document.querySelector('.button-container');
const buttons = document.querySelectorAll('.button');
const bCU = document.querySelector("#btnCU");
const bCP = document.querySelector("#btnCP");
const bCO = document.querySelector("#btnCO");
const bCT = document.querySelector("#btnCT");

buttons.forEach(button => {
  button.addEventListener('mouseenter', () => {
    buttonContainer.classList = 'button-container ' + button.id;
  });

  button.addEventListener('mouseleave', () => {
    buttonContainer.classList = 'button-container';
  });
});

console.log('Funciones de click entrando');
if (bCU) {
  bCU.addEventListener("click", () => {
    console.log("Se hizo clic en el botón Control de Usuarios");
    window.location.href = "access_admin.php";
  });
}

if (bCP) {
  bCP.addEventListener("click", () => {
    console.log("Se hizo clic en el botón Control de Publicaciones");
    window.location.href = "access_adminPost.php";
  });
}

if (bCO) {
  bCO.addEventListener("click", () => {
    console.log("Se hizo clic en el botón Control de Objetos");
    window.location.href = "access_admin2.php";
  });
}

if (bCT) {
  bCT.addEventListener("click", () => {
    console.log("Se hizo clic en el botón Control de Tipos");
    window.location.href = "access_admin3.php";
  });
}
});