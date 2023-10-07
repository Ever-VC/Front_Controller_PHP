<main>
    <section id="hero" class="blur-in-expand">
        <h1>CLIENTES</h1>
        <table class="table">
            <thead>
                <tr class="">
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Dirección</th>
                    <th>Productos favoritos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php 
            $id = 0;
            foreach($clients["clients"] as $client): 
                $id ++;
                $url = BASE_DIR . "clientes/{$id}";
                $li = "";
                foreach ($client["favproducts"] as $favproduct):
                    if ($favproduct != "") {
                        $li .= "<li>{$favproduct}</li>";
                    }
                endforeach;
                $btns = "";
                echo
                <<<OUTPUT
                        <tr>
                            <td>{$id}</td>
                            <td>{$client["firstname"]}</td>
                            <td>{$client["lastname"]}</td>
                            <td>{$client["birth"]}</td>
                            <td>{$client["address"]}</td>
                            <td>
                                <ul>{$li}</ul>                                
                            </td>
                            <td class="btns">
                                <a href="{$url}/elim" title="Eliminar"><i class="fas fa-trash"></i></a>
                                <a href="{$url}/edit" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{$url}" title="Ver perfil"><i class="fa-solid fa-address-card"></i></a>
                            </td>
                        </tr>
                OUTPUT;
            endforeach; ?>
        </table>
    </section>
</main>