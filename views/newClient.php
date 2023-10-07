<main>
    <section id="hero" class="blur-in-expand">
        <h1>REGISTRO DE CLIENTES</h1>
        <article class="newUser-container">
            <div class="title">
                <h2>Registro</h2>
                <hr>
            </div>
            <form action="<?= BASE_DIR; ?>clientes/newClient" method="post">
                <div class="form-group">
                    <p>Nombres</p>
                    <input class="input" type="text" name="firstname" placeholder="Ingrese los nombres...">
                </div>
                <div class="form-group">
                    <p>Apellidos</p>
                    <input class="input" type="text" name="lastname" placeholder="Ingrese los apellidos...">
                </div>
                <div class="form-group">
                    <p>Fecha de nacimiento</p>
                    <input class="input" type="date" name="birth" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group">
                    <p>Dirección de envío</p>
                    <input class="input" type="text" name="address" placeholder="Ingrese la dirección...">
                </div>
                <div class="form-group">
                    <p>Productos favoritos</p>
                    <div class="products">
                        <span>Laptops</span>
                        <input type="checkbox" name="product1" value="1">
                        <br>
                        <span>Monitores</span>
                        <input type="checkbox" name="product2" value="2">
                        <br>
                        <span>Teclados</span>
                        <input type="checkbox" name="product3" value="3">
                    </div>
                </div>
                <input class="btn" type="submit" value="Registrar">
            </form>
        </article>
    </section>
</main>