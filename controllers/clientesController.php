<?php

class clientesController {
    public $clientid;

    public function all()
    {
        require_once "models/Client.php";
        $client = new Client();
        $clients = $client->all();
        require_once "views/clients.php";
    }

    public function new()
    {
        require_once "views/newClient.php";
    }

    public function newClient()
    {
        require_once "models/Client.php";
        $client = new Client();
        $client->new();
    }

    public function viewProfile($userid)
    {
        require_once "models/Client.php";
        $client = new Client();
        $clients = $client->all();
        if (count($clients["clients"]) >= $userid) {
            $client = $clients["clients"][$userid-1];
            require_once "views/clientProfile.php";
        } else {
            echo
            <<<OUTPUT
                <main>
                    <section id="hero" class="blur-in-expand">
                        <h1>Error 404: El id del cliente que busca no existe.</h1>
                    </section>
                </main>`
            OUTPUT;
           
        }
    }

    public function edit($clientid) {
        $this->clientid = $clientid;
        require_once "models/Client.php";
        $client = new Client();
        $clients = $client->all();
        if (count($clients["clients"]) >= $clientid) {
            $client = $clients["clients"][$clientid-1];
            require_once "views/clientUpdate.php";
        } else {
            echo
            <<<OUTPUT
                <main>
                    <section id="hero" class="blur-in-expand">
                        <h1>Error 404: El id del cliente que busca no existe.</h1>
                    </section>
                </main>`
            OUTPUT;
           
        }
    }

    public function update($id) {
        require_once "models/Client.php";
        $clientObject = new Client();
        $clients = $clientObject->all();
        if (count($clients["clients"]) >= $id) {
            $clientObject->update($id);
        } else {
            echo
            <<<OUTPUT
                <main>
                    <section id="hero" class="blur-in-expand">
                        <h1>Error 404: El id del cliente que busca no existe.</h1>
                    </section>
                </main>`
            OUTPUT;
        }
    }

    public function elim($id)
    {
        require_once "models/Client.php";
        $client = new Client();
        $client = $client->delete($id);
        //require_once "views/clients.php";
    }
}