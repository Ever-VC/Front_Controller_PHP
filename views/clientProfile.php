<main>
    <section id="hero" class="blur-in-expand">
        <h1>PERFIL DEL CLIENTE</h1>
        <section class="user-container">
            <article class="user-image">
                <img src="<?= BASE_DIR; ?>imgs/user-profile.png" alt="">
            </article>
            <article class="user-data">
                <div class="user-personal-data">
                    <h2>Datos personales:</h2>
                    <?php 
                        echo
                        <<<OUTPUT
                            <p>Nombres: {$client["firstname"]}</p>
                            <p>Apellidos: {$client["lastname"]}</p>
                            <p>Fecha de nacimiento: {$client["birth"]}</p>
                            <p>Dirección: {$client["address"]}</p>
                        OUTPUT;
                    ?>
                </div>
                <div class="fav-products">
                    <h2>Productos favoritos:</h2>
                    <?php 
                        foreach ($client["favproducts"] as $favproduct):
                            echo
                            <<<OUTPUT
                                <p>{$favproduct}</p>
                            OUTPUT;
                        endforeach;
                    ?>
                </div>
            </article>
        </section>
    </section>
</main>