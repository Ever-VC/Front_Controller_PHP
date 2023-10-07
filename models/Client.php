<?php
class Client {

    public function all() {
        $data = file_get_contents(BASE_DIR . "database.json");
        $clients = json_decode($data, true);
        return $clients;
    }

    public function new() {
        $data = file_get_contents(BASE_DIR . "database.json");
        $users = json_decode($data, true);

        $favProducts = array();

        if ($_POST["product1"] == 1) {
            array_push($favProducts,"Laptops");
        }
        if ($_POST["product2"] == 2) {
            array_push($favProducts,"Monitores");
        }
        if ($_POST["product3"] == 3) {
            array_push($favProducts,"Teclados");
        }

        array_push($users["clients"],
            array(
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "birth" => $_POST["birth"],
                "favproducts" => $favProducts,
                "address" => $_POST["address"]
            )
        );

        file_put_contents("database.json", json_encode($users));
        header('Location: ' . BASE_DIR . 'clientes/');
    }

    public function update($id) {
        $data = file_get_contents(BASE_DIR . "database.json");
        $clients = json_decode($data, true);
        $favProducts = array();
        if ($_POST["product1"] == 1) {
            array_push($favProducts,"Laptops");
        }
        if ($_POST["product2"] == 2) {
            array_push($favProducts,"Monitores");
        }
        if ($_POST["product3"] == 3) {
            array_push($favProducts,"Teclados");
        }
        $clientUpdate = array(
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "birth" => $_POST["birth"],
            "favproducts" => $favProducts,
            "address" => $_POST["address"]
        );

        $clients["clients"][$id-1] = $clientUpdate;
        file_put_contents("database.json", json_encode($clients));
        header('Location: ' . BASE_DIR . 'clientes/');
    }

    public function delete($id) {
        $data = file_get_contents(BASE_DIR . "database.json");
        $clients = json_decode($data, true);
        echo '<br>Estamos a punto de eliminar el elemento: ' . $id;
        echo '<br>El nombre es: ' . $clients["clients"][$id-1]["firstname"];
        $idClient = 0;
        foreach($clients["clients"] as $client): 
            $idClient ++;
            if (($idClient - 1) == ($id - 1)) {
                unset($clients["clients"][$id - 1]);
            }
        endforeach;

        //$array = $clients["clients"];
        //unset($array[$id-1]);
        //$clients["clients"] = $array;
        file_put_contents("database.json", json_encode($clients));
        header('Location: ' . BASE_DIR . 'clientes/');
    }
}