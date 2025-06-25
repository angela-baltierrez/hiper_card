// Selección de elementos DOM
const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector('.container-cart-products');
const productsList = document.querySelector('.productos_cartas_disponible');
const valorTotal = document.querySelector('.total-pagar');
const countProducts = document.querySelector('#contador-productos');
const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');
const rowProduct = document.querySelector('.row-product');
const btnComprar = document.getElementById('btn-comprar');
// Cargar carrito desde LocalStorage o iniciar vacío
let allProducts = JSON.parse(localStorage.getItem('carrito')) || [];
showHTML();

// Mostrar/ocultar carrito al hacer clic en el icono
btnCart.addEventListener('click', () => {
	containerCartProducts.classList.toggle('hidden-cart');
});

// Agregar producto al carrito desde la lista de productos
productsList.addEventListener('click', e => {
	if (e.target.classList.contains('btn-add-cart')) {
		const product = e.target.parentElement;

		const infoProduct = {
			quantity: 1,
			title: product.querySelector('h2').textContent,
			price: product.querySelector('p').textContent,
		};

		const exists = allProducts.some(
			product => product.title === infoProduct.title
		);

		if (exists) {
			allProducts = allProducts.map(product => {
				if (product.title === infoProduct.title) {
					product.quantity++;
				}
				return product;
			});
		} else {
			allProducts = [...allProducts, infoProduct];
		}

		showHTML();
	}
});

// Eliminar producto del carrito al hacer clic en la X
rowProduct.addEventListener('click', e => {
	if (e.target.classList.contains('icon-close')) {
		const product = e.target.parentElement;
		const title = product.querySelector('p').textContent;

		allProducts = allProducts.filter(
			product => product.title !== title
		);

		showHTML();
	}
});

// Función para mostrar el carrito en el DOM y actualizar total y contador
function showHTML() {
	if (!allProducts.length) {
		cartEmpty.classList.remove('hidden');
		rowProduct.classList.add('hidden');
		cartTotal.classList.add('hidden');
	} else {
		cartEmpty.classList.add('hidden');
		rowProduct.classList.remove('hidden');
		cartTotal.classList.remove('hidden');
	}

	// Limpiar HTML previo
	rowProduct.innerHTML = '';

	let total = 0;
	let totalOfProducts = 0;

	allProducts.forEach(product => {
		const containerProduct = document.createElement('div');
		containerProduct.classList.add('cart-product');

		containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">${product.price}</span>
            </div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="icon-close"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        `;

		rowProduct.append(containerProduct);

		total += parseInt(product.quantity * product.price.slice(1));
		totalOfProducts += product.quantity;
	});

	valorTotal.innerText = `$${total}`;
	countProducts.innerText = totalOfProducts;

	// Guardar carrito actualizado en LocalStorage
	localStorage.setItem('carrito', JSON.stringify(allProducts));

	// Botón Comprar
const btnComprar = document.getElementById('btn-comprar');

btnComprar.addEventListener('click', () => {
    if (allProducts.length === 0) {
        alert('El carrito está vacío.');
        return;
    }

    // Calcular total
    const total = allProducts.reduce((acc, product) => {
        return acc + product.quantity * parseFloat(product.price.replace(/[^0-9.-]+/g, ""));
    }, 0);

    // Guardar en localStorage
    localStorage.setItem('totalCompra', total);
    localStorage.setItem('historialCompra', JSON.stringify(allProducts));

    // Redirigir a la página de confirmación
    window.location.href = 'pago.php';
});

}

//para mostrar el interfaz del usuario
    const btnPerfil = document.getElementById("btn-perfil");
    const miniPerfil = document.getElementById("mini-perfil");
    const passwordText = document.getElementById("password-text");
    let mostrar = false;

    btnPerfil.addEventListener("click", () => {
        miniPerfil.style.display = miniPerfil.style.display === "none" ? "block" : "none";
    });

    function togglePassword() {
        if (mostrar) {
            passwordText.textContent = "********";
        } else {
            passwordText.textContent = "<?php echo isset($_SESSION['password']) ? htmlspecialchars($_SESSION['password']) : '12345678'; ?>";
        }
        mostrar = !mostrar;
    }

    // Ocultar al hacer clic fuera
    document.addEventListener("click", function(e) {
        if (!miniPerfil.contains(e.target) && e.target !== btnPerfil) {
            miniPerfil.style.display = "none";
        }
		
    });
