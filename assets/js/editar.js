document.addEventListener("DOMContentLoaded", function () {
  var editarModal = document.getElementById('editarModal');
  editarModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;

    var nombre = button.getAttribute('data-nombre');
    var precio = button.getAttribute('data-precio');
    var stock = button.getAttribute('data-stock');
    var categoriaNombre = button.getAttribute('data-nombre_categoria');
      var idCategoria = button.getAttribute('data-id_categoria');
    var descripcion = button.getAttribute('data-descripcion');
    var id = button.getAttribute('data-id');

    document.getElementById('modal_nombre_producto').textContent = nombre;
    document.getElementById('modal_precio_producto').textContent = "$" + precio;
    document.getElementById('modal_stock_producto').textContent = stock;
    document.getElementById('modal_categoria_nombre').textContent = categoriaNombre;
    document.getElementById('modal_descripcion_producto').textContent = descripcion;

    document.getElementById('producto_id').value = id;
    document.getElementById('nombre_producto').value = nombre;
    document.getElementById('precio_producto').value = precio;
    document.getElementById('stock_producto').value = stock;
    document.getElementById('descripcion_producto').value = descripcion;
    
     document.getElementById('categoria_producto').value = idCategoria; 
     var id_categoria = button.getAttribute('data-id_categoria');
document.getElementById('id_categoria_editar').value = id_categoria;
  });
});