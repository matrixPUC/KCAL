function mostrarCampo() {
   var campoCRN = document.getElementById("campo-crn");
   var campoInstagram = document.getElementById("campo-instagram");
   
   campoCRN.style.display = "block";
   campoInstagram.style.display = "block";
   campoCRN.querySelector("input").setAttribute("required", "required");
   campoInstagram.querySelector("input").setAttribute("required", "required");
}

function ocultarCampo() {
   var campoCRN = document.getElementById("campo-crn");
   var campoInstagram = document.getElementById("campo-instagram");
   
   campoCRN.style.display = "none";
   campoInstagram.style.display = "none";
   campoCRN.querySelector("input").removeAttribute("required");
   campoInstagram.querySelector("input").removeAttribute("required");
}
