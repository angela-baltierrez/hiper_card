//ocultar el formulario de la tarjeta y mostrar el formulario de envío.
  document.getElementById('btnVolver').addEventListener('click', () => {
  document.getElementById('form-tarjeta').style.display = 'none';
  document.getElementById('form-envio').style.display = 'block';
});
//ocultamos el formulario de envío y mostrar el formulario de la tarjeta.
  document.getElementById('btnSiguiente').addEventListener('click', () => {
    document.getElementById('form-envio').style.display = 'none';
    document.getElementById('form-tarjeta').style.display = 'block';
  });
