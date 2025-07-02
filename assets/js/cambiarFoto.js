    function cambiarFoto(element) {
        // Obtener la fuente de la imagen seleccionada
        const nuevaFuente = element.src; //nuevafuente guarda la infor
        // Cambiar la imagen principal a la nueva fuente
        document.getElementById('foto_seleccionada').src = nuevaFuente; //sera la nueva foto grande

            // Remover la clase de borde de todas las miniaturas
        const miniaturas = document.querySelectorAll('.paraminiproducto img'); 
        miniaturas.forEach(img => img.classList.remove('imagen-seleccionada'));

        // Agregar el borde a la imagen seleccionada
        element.classList.add('imagen-seleccionada');
    }