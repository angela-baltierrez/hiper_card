<?php 
require_once ('../hiper_card/assets/php/conexion-departamentos.php'); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Codescandy" name="author">
		<title>Home</title>
		<link href="./assets/libs/slick-carousel/slick/slick.css" rel="stylesheet" />
		<link href="./assets/libs/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
		<link href="./assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="stylesheet" href="../hiper_card/assets/css/departamentos.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


		<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon/favicon.ico">


<!-- Libs CSS -->
<link href="./assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="./assets/libs/feather-webfont/dist/feather-icons.css" rel="stylesheet">
<link href="./assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


<!-- Theme CSS -->
<link rel="stylesheet" href="./assets/css/theme.min.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
<script>
   window.dataLayer = window.dataLayer || [];
   function gtag() {
      dataLayer.push(arguments);
   }
   gtag("js", new Date());

   gtag("config", "G-M8S4MT3EYG");
</script>
 <script type="text/javascript">
   (function (c, l, a, r, i, t, y) {
      c[a] =
         c[a] ||
         function () {
            (c[a].q = c[a].q || []).push(arguments);
         };
      t = l.createElement(r);
      t.async = 1;
      t.src = "https://www.clarity.ms/tag/" + i;
      y = l.getElementsByTagName(r)[0];
      y.parentNode.insertBefore(t, y);
   })(window, document, "clarity", "script", "kuc8w5o9nt");
</script>

	</head>

	<body>
					<nav class="navbar navbar-light" style="background-color:rgb(37, 197, 51);">
  <div class="container-fluid">
    <a class="navbar-brand">Hiper-Card</a>
	<div class="dropdown me-3 d-none d-lg-block">
						<button  style="background-color: #fff; color: #2da82d; margin-left: -350px;" class="btn btn-primary px-6" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="me-1">
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="16"
									height="16"
									viewBox="0 0 24 24"
									fill="none"
									stroke="currentColor"
									stroke-width="1.2"
									stroke-linecap="round"
									stroke-linejoin="round"
									class="feather feather-grid"
								>
									<rect x="3" y="3" width="7" height="7"></rect>
									<rect x="14" y="3" width="7" height="7"></rect>
									<rect x="14" y="14" width="7" height="7"></rect>
									<rect x="3" y="14" width="7" height="7"></rect>
								</svg>
							</span>
							Departamentos
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      				    <li><a class="dropdown-item" href="departamentos.php?categoria=snacks">Snacks</a></li>
      				    <li><a class="dropdown-item" href="departamentos.php?categoria=bebidas">Bebidas</a></li>
     				    <li><a class="dropdown-item" href="departamentos.php?categoria=fruta">Fruta fresca</a></li>
     				    <li><a class="dropdown-item" href="departamentos.php?categoria=lacteos">Leche y yogur</a></li>
     				    <li><a class="dropdown-item" href="departamentos.php?categoria=liempieza">Detegente y Desinfectante</a></li>
    				    <li><a class="dropdown-item" href="departamentos.php?categoria=carne">carne y pollo</a></li>
						</ul>
					</div>
    <form class="d-flex">
		
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
	
    </form>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content p-4">
			<div>
				<div class="modal-header border-0">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div style="display: flex; justify-content: center; align-items: center;" class="modal-title" id="userModalLabel"><img style="height: 150px; width: 150px; border-radius: 100%;" src="assets/images/icons/panda.png"></div>
			</div>
			<h2 style="display: flex; justify-content: center; align-items: center; margin-top: 15px;">Usuario_Panda030</h2>
			<div class="modal-body">
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<div style="display: flex; align-items: center;">
							<input type="password" class="form-control" id="password" placeholder="Enter Password" required/>
							<i type="submit" style="padding-left: 20px;" class="bi bi-pencil"></i>
						</div>
						<div class="invalid-feedback">Please enter email.</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Telefono</label>
						<div style="display: flex; align-items: center;">
							<input type="password" class="form-control" id="password" placeholder="Enter Password" required/>
							<i type="submit" style="padding-left: 20px;" class="bi bi-pencil"></i>
						</div>
						<div class="invalid-feedback">Please enter password.</div>
					</div>

					<button style="margin-top: 10px;" class="btn btn-primary" type="submit">Confirmar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Shop Cart -->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
	<div class="offcanvas-header border-bottom">
		<div class="text-start">
			<h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
			<small>Location in 382480</small>
		</div>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<div>
			<!-- alert -->
			<div class="alert alert-danger p-2" role="alert">
				You’ve got FREE delivery. Start
				<a href="#!" class="alert-link">checkout now!</a>
			</div>
			<ul class="list-group list-group-flush">
				<!-- list group -->

				<!-- list group -->
				<li class="list-group-item py-3 ps-0">
					<!-- row -->
					<div class="row align-items-center">
						<div class="col-6 col-md-6 col-lg-7">
							<div class="d-flex">
								<img src="./assets/images/products/product-img-2.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
								<div class="ms-3">
									<a href="./pages/shop-single.html" class="text-inherit">
										<h6 class="mb-0">NutriChoice Digestive</h6>
									</a>
									<span><small class="text-muted">250g</small></span>
									<!-- text -->
									<div class="mt-2 small lh-1">
										<a href="#!" class="text-decoration-none text-inherit">
											<span class="me-1 align-text-bottom">
												<svg
													xmlns="http://www.w3.org/2000/svg"
													width="14"
													height="14"
													viewBox="0 0 24 24"
													fill="none"
													stroke="currentColor"
													stroke-width="2"
													stroke-linecap="round"
													stroke-linejoin="round"
													class="feather feather-trash-2 text-success"
												>
													<polyline points="3 6 5 6 21 6"></polyline>
													<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
													<line x1="10" y1="11" x2="10" y2="17"></line>
													<line x1="14" y1="11" x2="14" y2="17"></line>
												</svg>
											</span>
											<span class="text-muted">Remove</span>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- input group -->
						<div class="col-4 col-md-3 col-lg-3">
							<!-- input -->
							<!-- input -->
							<div class="input-group input-spinner">
								<input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
								<input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
								<input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
							</div>
						</div>
						<!-- price -->
						<div class="col-2 text-lg-end text-start text-md-end col-md-2">
							<span class="fw-bold text-danger">$20.00</span>
							<div class="text-decoration-line-through text-muted small">$26.00</div>
						</div>
					</div>
				</li>
				<!-- list group -->
				<li class="list-group-item py-3 ps-0">
					<!-- row -->
					<div class="row align-items-center">
						<div class="col-6 col-md-6 col-lg-7">
							<div class="d-flex">
								<img src="./assets/images/products/product-img-3.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
								<div class="ms-3">
									<!-- title -->
									<a href="./pages/shop-single.html" class="text-inherit">
										<h6 class="mb-0">Cadbury 5 Star Chocolate</h6>
									</a>
									<span><small class="text-muted">1 kg</small></span>
									<!-- text -->
									<div class="mt-2 small lh-1">
										<a href="#!" class="text-decoration-none text-inherit">
											<span class="me-1 align-text-bottom">
												<svg
													xmlns="http://www.w3.org/2000/svg"
													width="14"
													height="14"
													viewBox="0 0 24 24"
													fill="none"
													stroke="currentColor"
													stroke-width="2"
													stroke-linecap="round"
													stroke-linejoin="round"
													class="feather feather-trash-2 text-success"
												>
													<polyline points="3 6 5 6 21 6"></polyline>
													<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
													<line x1="10" y1="11" x2="10" y2="17"></line>
													<line x1="14" y1="11" x2="14" y2="17"></line>
												</svg>
											</span>
											<span class="text-muted">Remove</span>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- input group -->
						<div class="col-4 col-md-3 col-lg-3">
							<!-- input -->
							<!-- input -->
							<div class="input-group input-spinner">
								<input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
								<input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
								<input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
							</div>
						</div>
						<!-- price -->
						<div class="col-2 text-lg-end text-start text-md-end col-md-2">
							<span class="fw-bold">$15.00</span>
							<div class="text-decoration-line-through text-muted small">$20.00</div>
						</div>
					</div>
				</li>
				<!-- list group -->
				<li class="list-group-item py-3 ps-0">
					<!-- row -->
					<div class="row align-items-center">
						<div class="col-6 col-md-6 col-lg-7">
							<div class="d-flex">
								<img src="./assets/images/products/product-img-4.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
								<div class="ms-3">
									<!-- title -->
									<!-- title -->
									<a href="./pages/shop-single.html" class="text-inherit">
										<h6 class="mb-0">Onion Flavour Potato</h6>
									</a>
									<span><small class="text-muted">250g</small></span>
									<!-- text -->
									<div class="mt-2 small lh-1">
										<a href="#!" class="text-decoration-none text-inherit">
											<span class="me-1 align-text-bottom">
												<svg
													xmlns="http://www.w3.org/2000/svg"
													width="14"
													height="14"
													viewBox="0 0 24 24"
													fill="none"
													stroke="currentColor"
													stroke-width="2"
													stroke-linecap="round"
													stroke-linejoin="round"
													class="feather feather-trash-2 text-success"
												>
													<polyline points="3 6 5 6 21 6"></polyline>
													<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
													<line x1="10" y1="11" x2="10" y2="17"></line>
													<line x1="14" y1="11" x2="14" y2="17"></line>
												</svg>
											</span>
											<span class="text-muted">Remove</span>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- input group -->
						<div class="col-4 col-md-3 col-lg-3">
							<!-- input -->
							<!-- input -->
							<div class="input-group input-spinner">
								<input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
								<input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
								<input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
							</div>
						</div>
						<!-- price -->
						<div class="col-2 text-lg-end text-start text-md-end col-md-2">
							<span class="fw-bold">$15.00</span>
							<div class="text-decoration-line-through text-muted small">$20.00</div>
						</div>
					</div>
				</li>
				<!-- list group -->
				<li class="list-group-item py-3 ps-0 border-bottom">
					<!-- row -->
					<div class="row align-items-center">
						<div class="col-6 col-md-6 col-lg-7">
							<div class="d-flex">
								<img src="./assets/images/products/product-img-5.jpg" alt="Ecommerce" class="icon-shape icon-xxl" />
								<div class="ms-3">
									<!-- title -->
									<a href="./pages/shop-single.html" class="text-inherit">
										<h6 class="mb-0">Salted Instant Popcorn</h6>
									</a>
									<span><small class="text-muted">100g</small></span>
									<!-- text -->
									<div class="mt-2 small lh-1">
										<a href="#!" class="text-decoration-none text-inherit">
											<span class="me-1 align-text-bottom">
												<svg
													xmlns="http://www.w3.org/2000/svg"
													width="14"
													height="14"
													viewBox="0 0 24 24"
													fill="none"
													stroke="currentColor"
													stroke-width="2"
													stroke-linecap="round"
													stroke-linejoin="round"
													class="feather feather-trash-2 text-success"
												>
													<polyline points="3 6 5 6 21 6"></polyline>
													<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
													<line x1="10" y1="11" x2="10" y2="17"></line>
													<line x1="14" y1="11" x2="14" y2="17"></line>
												</svg>
											</span>
											<span class="text-muted">Remove</span>
										</a>
									</div>
								</div>
							</div>
						</div>

						<!-- input group -->
						<div class="col-4 col-md-3 col-lg-3">
							<!-- input -->
							<!-- input -->
							<div class="input-group input-spinner">
								<input type="button" value="-" class="button-minus btn btn-sm" data-field="quantity" />
								<input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input" />
								<input type="button" value="+" class="button-plus btn btn-sm" data-field="quantity" />
							</div>
						</div>
						<!-- price -->
						<div class="col-2 text-lg-end text-start text-md-end col-md-2">
							<span class="fw-bold">$15.00</span>
							<div class="text-decoration-line-through text-muted small">$25.00</div>
						</div>
					</div>
				</li>
			</ul>
			<!-- btn -->
			<div class="d-flex justify-content-between mt-4">
				<a href="#!" class="btn btn-primary">Continue Shopping</a>
				<a href="#!" class="btn btn-dark">Update Cart</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body p-6">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<h5 class="mb-1" id="locationModalLabel">Choose your Delivery Location</h5>
						<p class="mb-0 small">Enter your address and we will specify the offer you area.</p>
					</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="my-5">
					<input type="search" class="form-control" placeholder="Search your area" />
				</div>
				<div class="d-flex justify-content-between align-items-center mb-2">
					<h6 class="mb-0">Select Location</h6>
					<a href="#" class="btn btn-outline-gray-400 text-muted btn-sm">Clear All</a>
				</div>
				<div>
					<div data-simplebar style="height: 300px">
						<div class="list-group list-group-flush">
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action active">
								<span>Alabama</span>
								<span>Min:$20</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Alaska</span>
								<span>Min:$30</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Arizona</span>
								<span>Min:$50</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>California</span>
								<span>Min:$29</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Colorado</span>
								<span>Min:$80</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Florida</span>
								<span>Min:$90</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Arizona</span>
								<span>Min:$50</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>California</span>
								<span>Min:$29</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Colorado</span>
								<span>Min:$80</span>
							</a>
							<a href="#" class="list-group-item d-flex justify-content-between align-items-center px-2 py-3 list-group-item-action">
								<span>Florida</span>
								<span>Min:$90</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="./assets/js/vendors/validation.js"></script>

		<main>
			<section class="mt-8">
				<div class="container">
					<div class="hero-slider">
						<div style="background: url(./assets/images/slider/slide-1.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
							<div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
								<span class="badge text-bg-warning"> Descuentos de hasta el 50%</span>

								<h2 class="text-dark display-5 fw-bold mt-4">Registrate y obten beneficios</h2>
								<p class="lead">Al regitrarse no solo obtienen descuentos exclucivos sino que tambien el envio de su pedido a domicilio.</p>
								<a href="../hiper_card/registro.php" class="btn btn-dark mt-3">
									Registrate
									<i class="feather-icon icon-arrow-right ms-1"></i>
								</a>
							</div>
						</div>
						<div style="background: url(./assets/images/slider/slider-2.jpg) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">

						</div>
					</div>
				</div>
			</section>

		
			
			<!-- Popular Products Start-->
			<section class="my-lg-14 my-8">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-6">
							<h3 class="mb-0">Popular Products</h3>
						</div>
					</div>


					<div class="productos_cartas_disponible">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="columna">
                    <div class="cuerpo_de_la_carta"> 
                        <div class="cuerpo_carta_imagen">
                            <a href="registro.php?id=<?php echo $producto['id_producto']; ?>">
                                <img src="../hiper_card/assets/images/products/<?php echo strtolower(str_replace(' ', '', $producto['nombre_producto'])); ?>.jpg" 
                                    alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>">
                            </a>
                        </div>
                        <div class="departamentos_pertence">
                            <a href="departamentos.php?categoria=<?php echo urlencode($producto['nombre_categoria']); ?>">
                                <?php echo htmlspecialchars($producto['nombre_categoria']); ?>
                            </a>
                        </div>
                        <h2 class="nombre_del_producto-h2"><?php echo htmlspecialchars($producto['nombre_producto']); ?></h2>
                        <p class="precio_producto-p">$<?php echo $producto['precio']; ?></p>
						<a href="registro.php">
                        <button class="btn-add-cart">Comprar</button>
			</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles.</p>
        <?php endif; ?>
    </div>



			</section>
			<!-- Popular Products End-->
			
			
		</main>

		<!-- Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-8">
        <div class="position-absolute top-0 end-0 me-3 mt-3">
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <!-- img slide -->
            <div class="product productModal" id="productModal">
              <div
                class="zoom"
                onmousemove="zoom(event)"
                style="
                  background-image: url(./assets/images/products/product-single-img-1.jpg);
                "
              >
                <!-- img -->
                <img
                  src="./assets/images/products/product-single-img-1.jpg"
                  alt=""
            >
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(./assets/images/products/product-single-img-2.jpg);
                  "
                >
                  <!-- img -->
                  <img
                    src="./assets/images/products/product-single-img-2.jpg"
                    alt=""
              >
                </div>
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(./assets/images/products/product-single-img-3.jpg);
                  "
                >
                  <!-- img -->
                  <img
                    src="./assets/images/products/product-single-img-3.jpg"
                    alt=""
              >
                </div>
              </div>
              <div>
                <div
                  class="zoom"
                  onmousemove="zoom(event)"
                  style="
                    background-image: url(./assets/images/products/product-single-img-4.jpg);
                  "
                >
                  <!-- img -->
                  <img
                    src="./assets/images/products/product-single-img-4.jpg"
                    alt=""
              >
                </div>
              </div>
            </div>
            <!-- product tools -->
            <div class="product-tools">
              <div class="thumbnails row g-3" id="productModalThumbnails">
                <div class="col-3" class="tns-nav-active">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="./assets/images/products/product-single-img-1.jpg"
                      alt=""
                >
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img" >
                    <!-- img -->
                    <img
                      src="./assets/images/products/product-single-img-2.jpg"
                      alt=""
                >
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="./assets/images/products/product-single-img-3.jpg"
                      alt=""
                >
                  </div>
                </div>
                <div class="col-3">
                  <div class="thumbnails-img">
                    <!-- img -->
                    <img
                      src="./assets/images/products/product-single-img-4.jpg"
                      alt=""
                >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ps-lg-8 mt-6 mt-lg-0">
              <a href="#!" class="mb-4 d-block">Bakery Biscuits</a>
              <h2 class="mb-1 h1">Napolitanke Ljesnjak</h2>
              <div class="mb-4">
                <small class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i></small
                ><a href="#" class="ms-2">(30 reviews)</a>
              </div>
              <div class="fs-4">
                <span class="fw-bold text-dark">$32</span>
                <span class="text-decoration-line-through text-muted">$35</span
                ><span
                  ><small class="fs-6 ms-2 text-danger">26% Off</small></span
                >
              </div>
              <hr class="my-6">
              <div class="mb-4">
                <button type="button" class="btn btn-outline-secondary">
                  250g
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  500g
                </button>
                <button type="button" class="btn btn-outline-secondary">
                  1kg
                </button>
              </div>
              <div>
                <!-- input -->
                <!-- input -->
                <div class="input-group input-spinner  ">
                  <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                  <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input   ">
                  <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
                </div>
              </div>
              <div
                class="mt-3 row justify-content-start g-2 align-items-center"
              >

                <div class="col-lg-4 col-md-5 col-6 d-grid">
                  <!-- button -->
                  <!-- btn -->
                  <button type="button" class="btn btn-primary">
                    <i class="feather-icon icon-shopping-bag me-2"></i>Add to
                    cart
                  </button>
                </div>
                <div class="col-md-4 col-5">
                  <!-- btn -->
                  <a
                    class="btn btn-light"
                    href="#"
                    data-bs-toggle="tooltip"
                    data-bs-html="true"
                    aria-label="Compare"
                    ><i class="bi bi-arrow-left-right"></i
                  ></a>
                  <a
                    class="btn btn-light"
                    href="#!"
                    data-bs-toggle="tooltip"
                    data-bs-html="true"
                    aria-label="Wishlist"
                    ><i class="feather-icon icon-heart"></i
                  ></a>
                </div>
              </div>
              <hr class="my-6">
              <div>
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td>Product Code:</td>
                      <td>FBB00255</td>
                    </tr>
                    <tr>
                      <td>Availability:</td>
                      <td>In Stock</td>
                    </tr>
                    <tr>
                      <td>Type:</td>
                      <td>Fruits</td>
                    </tr>
                    <tr>
                      <td>Shipping:</td>
                      <td>
                        <small
                          >01 day shipping.<span class="text-muted"
                            >( Free pickup today)</span
                          ></small
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <!-- footer -->
<footer class="footer">
  <div class="container">
    <div class="row g-4 py-4">
      <div class="col-12 col-md-12 col-lg-4">
        <h6 class="mb-4">Categories</h6>
        <div class="row">
          <div class="col-6">
            <!-- list -->
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Vegetables & Fruits</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Breakfast & instant food</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Bakery & Biscuits</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Atta, rice & dal</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Sauces & spreads</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Organic & gourmet</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Baby care</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Cleaning essentials</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Personal care</a></li>
            </ul>
          </div>
          <div class="col-6">
              <!-- list -->
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Dairy, bread & eggs</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Cold drinks & juices</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Tea, coffee & drinks</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Masala, oil & more</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Chicken, meat & fish</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Paan corner</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link"> Pharma & wellness</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Home & office</a></li>
              <li class="nav-item mb-2"><a href="#!" class="nav-link">Pet care</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

		<!-- Javascript-->

		<!-- Libs JS -->
<!-- <script src="./assets/libs/jquery/dist/jquery.min.js"></script> -->
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>

<!-- Theme JS -->
<script src="./assets/js/theme.min.js"></script>

		<script src="./assets/js/vendors/jquery.min.js"></script>
		<script src="./assets/js/vendors/countdown.js"></script>
		<script src="./assets/libs/slick-carousel/slick/slick.min.js"></script>
		<script src="./assets/js/vendors/slick-slider.js"></script>
		<script src="./assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
		<script src="./assets/js/vendors/tns-slider.js"></script>
		<script src="./assets/js/vendors/zoom.js"></script>
	</body>
</html>