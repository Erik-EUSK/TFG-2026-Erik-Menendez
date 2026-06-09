<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Play Store - Wireframe a Color</title>
    <!-- Aquí enlazamos tu archivo CSS externo respetando tu estructura de carpetas -->
    <link rel="stylesheet" href="../recursos/css/style.css">
</head>
<body>

    <!-- BLOQUE 1: CABECERA (Azul claro) -->
    <header class="bloque-cabecera">
        <h2>Lumina Play Store</h2>
        <p>(Encabezado)</p>
        <nav>
            <ul class="menu-navegacion">
                 <li><a href="../index.php">Inicio</a></li>
                <li><a href="videojuegos.php">Videojuegos</a></li>
                <li><a href="libros.php">Libros</a></li>
                <li><a href="#">Mi Saldo</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- BLOQUE 2: CONTENEDOR PRINCIPAL (Verde claro) -->
    <main class="bloque-principal">
        <section class="catalogo-grid">
            <!-- TARJETAS (Amarillas) -->
            <article class="producto-card">
				<img src="../recursos/img/thewitcher.webp" alt="" class="img-card">
                <h3>The Witcher 3</h3>
                <p>Precio: 2500 pts</p>
				<form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/reddead.jpg" alt="" class="img-card">
                <h3>Red Dead Redemption 2</h3>
                <p>Precio: 1500 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/uncharted.jpg" alt="" class="img-card">
                <h3>Uncharted 4</h3>
                <p>Precio: 3000 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/tlou.jpg" alt="" class="img-card">
                <h3>The Last of Us</h3>
                <p>Precio: 1200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/tlou2.jpg" alt="" class="img-card">
                <h3>The Last of Us 2</h3>
                <p>Precio: 2500 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/bo3.jpg" alt="" class="img-card">
                <h3>Call of Duty Black Ops 3</h3>
                <p>Precio: 1000 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/r6.jpg" alt="" class="img-card">
                <h3>Rainbow Six Siege</h3>
                <p>Precio: 1800 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
            <article class="producto-card">
                <img src="../recursos/img/stardew.png" alt="" class="img-card">
                <h3>Stardew Valley</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
              <article class="producto-card">
                <img src="../recursos/img/battlefront.jpg" alt="" class="img-card">
                <h3>Star Wars Battlfront 2</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
              <article class="producto-card">
                <img src="../recursos/img/expedition.webp" alt="" class="img-card">
                <h3>Expedition 33</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
              <article class="producto-card">
                <img src="../recursos/img/ds.avif" alt="" class="img-card">
                <h3>Dark Souls 3</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
               <article class="producto-card">
                <img src="../recursos/img/spyro.webp" alt="" class="img-card">
                <h3>Spyro</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>

               <article class="producto-card">
                <img src="../recursos/img/sekiro.jpg" alt="" class="img-card">
                <h3>Sekiro </h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>

               <article class="producto-card">
                <img src="../recursos/img/detroit.jpg" alt="" class="img-card">
                <h3>Detroit Become Human</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>

               <article class="producto-card">
                <img src="../recursos/img/subnautica.jpg" alt="" class="img-card">
                <h3>Subnautica</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>

               <article class="producto-card">
                <img src="../recursos/img/cyberpunk.jpg" alt="" class="img-card">
                <h3>Cyberpunk</h3>
                <p>Precio: 2200 pts</p>
                <form>
					<button>Comprar</button>
				</form>
            </article>
        </section>
    </main>

    <!-- BLOQUE 3: PIE DE PÁGINA (Morado claro) -->
    <footer class="bloque-pie">
        <p>PIE DE PÁGINA</p>
        <p>Lumina Play Store © 2026 - Todos los derechos reservados</p>
    </footer>

</body>
</html>