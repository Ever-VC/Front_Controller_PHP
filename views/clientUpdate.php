<main>
    <section id="hero" class="blur-in-expand">
        <h1>EDITAR CLIENTE</h1>
        <article class="newUser-container">
        <div class="title">
            <h2>Actualizar registro</h2>
            <hr>
        </div>
            <form action="<?= BASE_DIR; ?>clientes/<?= $this->clientid; ?>/update" method="post">
            
                <?php
                    $clientid = $this->clientid;
                    echo
                    <<<OUTPUT
                    <div class="form-group">
                        <p>Nombres</p>
                        <input class="input" type="text" name="firstname" placeholder="Ingrese los nombres..." value="{$client["firstname"]}">
                    </div>
                    <div class="form-group">
                        <p>Apellidos</p>
                        <input class="input" type="text" name="lastname" placeholder="Ingrese los apellidos..." value="{$client["lastname"]}">
                    </div>
                    <div class="form-group">
                        <p>Fecha de nacimiento</p>
                        <input class="input" type="date" name="birth" placeholder="dd/mm/yyyy" value="{$client["birth"]}">
                    </div>
                    <div class="form-group">
                        <p>Dirección de envío</p>
                        <input class="input" type="text" name="address" placeholder="Ingrese la dirección..." value="{$client["address"]}">
                    </div>
                    <div class="form-group">
                        <p>Productos favoritos</p>
                        <div class="products">
                            
                    OUTPUT;
                    if (in_array("Laptops", $client["favproducts"])) {
                        echo
                        <<<OUTPUT
                            <span>Laptops</span>
                            <input type="checkbox" name="product1" value="1" checked>
                            <br>
                        OUTPUT;
                    } else {
                        echo
                        <<<OUTPUT
                            <span>Laptops</span>
                            <input type="checkbox" name="product1" value="1">
                            <br>
                        OUTPUT;
                    }
                    if (in_array("Monitores", $client["favproducts"])) {
                        echo
                        <<<OUTPUT
                            <span>Monitores</span>
                            <input type="checkbox" name="product2" value="2" checked>
                            <br>
                        OUTPUT;
                    } else {
                        echo
                        <<<OUTPUT
                            <span>Monitores</span>
                            <input type="checkbox" name="product2" value="2">
                            <br>
                        OUTPUT;
                    }
                    if (in_array("Teclados", $client["favproducts"])) {
                        echo
                        <<<OUTPUT
                                <span>Teclados</span>
                                <input type="checkbox" name="product3" value="3" checked>
                            </div>
                        OUTPUT;
                    } else {
                        echo
                        <<<OUTPUT
                                <span>Teclados</span>
                                <input type="checkbox" name="product3" value="3">
                            </div>
                        OUTPUT;
                    }
                ?>
                <input class="btn" type="submit" value="Actualizar">
            </form>
        </article>
    </section>
</main>