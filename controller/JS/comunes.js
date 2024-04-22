//para limpiar los gets y llevar al usuario a inicio otra vez

document.getElementById('limpiarParametro').addEventListener('click', function(event) {
    event.preventDefault(); 
    limpiarParametro();
});

document.getElementById('limpiarParametro2').addEventListener('click', function(event) {
    event.preventDefault();
    limpiarParametro();
});


//hacer visible o no el menú de movil.
const menuToggle = document.querySelector('.menu-toggle');
const mobileMenu = document.querySelector('.mobile-menu');

if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('visible');
    });
}

//funcion para los botones de inicio.

function limpiarParametro() {
    let url = window.location.href; // Obtener la URL actual
    let cleanUrl = url.split('?')[0]; // Eliminar cualquier parámetro de la URL
    window.location.href = cleanUrl; // Redirigir a la URL limpia
}

//funciones para el formulario de editar.

document.getElementById('editarPerfil').addEventListener('click', function() {
    var inputs = document.querySelectorAll('#perfilForm input[type="text"], #perfilForm input[type="email"]');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].removeAttribute('disabled');
    }
    document.getElementById('viejaPwd').value = '';
    document.getElementById('editarPerfil').style.display = 'none';
    document.getElementById('guardarPerfil').style.display = 'inline-block';
    document.getElementById('cambiarContraseña').style.display = 'inline-block';
});

document.getElementById('cambiarContraseña').addEventListener('click', function() {
    var contraseñaFields = document.getElementById('contraseñaFields');
    if (contraseñaFields.style.display === 'none') {
        contraseñaFields.style.display = 'block';
        document.getElementById('viejaPwd').value = '';
    } else {
        contraseñaFields.style.display = 'none';
    }
});

