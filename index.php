<?php 
require_once "render/BaseLayout.php";
require_once "config/configControllers.php";
BaseLayout::renderHead();

/**************** CONTROLADOR FRONTAL *********************/

// Definimos un ontrolador por defecto
$controller = DEFAULT_CONTROLLER;

// Definimos una acción por defecto
$action = DEFAULT_ACTION;

// Tomamos el controlador requerido por el usuario
// en caso de no especificarse seleccionamos el controlador por defecto.
if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
    $controller = strtolower($controller);
}

// Tomamos la accion requerida por el usuario
// en caso de no especificarse seleccionamos la acción por defecto.
if(!empty($_GET['action']))
{
    $action = $_GET['action'];
}

// --- ALMACENA EL TERCER PARAMETRO DE LA RUTA (edit)

//edit action
$editAction = "";

if(!empty($_GET['edit']))
{
    $editAction = $_GET['edit'];
}
/* echo "<br>Controlador: " . $controller;
echo "<br>Action: " . $action;
echo "<br>Other: " . $editAction; */

if ($action == "update") {
    $dataurl = explode('/', $controller);
    $action = end($dataurl);
    $editAction = "update";
    $controller = "index.php";
}

if ($action == "elim") {
    $dataurl = explode('/', $controller);
    $action = end($dataurl);
    $editAction = "elim";
    $controller = "index.php";
}


// Ya tenemos el controlador y la accion
// Formamos el nombre del fichero que contiene nuestro controlador
if ($controller == "index.php" && is_numeric($action) && ($editAction == "edit" || $editAction == "update" || $editAction == "elim")) {
    $fullController = CONTROLLERS_DIR . "clientesController.php";
    $controller = "clientesController";

    // Si la variable ($controller) es un fichero lo requerimos
    require_once ($fullController);
    $printController = new $controller();

    // Si la variable ($action) contiene un número, llama a la clases necesarias para realizar acciones con clientes específos
    if (is_numeric($action)) {
        $action = (int)$action;
        if ($editAction != "") {
            //Caso en que se desee "editar" un cliente
            if ($editAction == "update") {
                $printController->$editAction($action);
            } else if ($editAction == "elim") {
                echo 'Esta eliminando el elemento: ' . $action;
                $printController->$editAction($action);
            } else {
                $printController->$editAction($action);
            }
        } else {
            $printController->viewProfile($action);
        }
    } else {
        //POR ALGUNA RAZON QUE DESCONOZCO, ACTION TOMA EL VALOR DE "index" CUANDO NO SE INSERTA NADA XD
        if ($action == "index" && $controller == "clientesController") {
            $printController->all();
        } else {
            $action = strtolower($action);
            // Si la variable $action es una función la ejecutamos o detenemos el script
            if(method_exists($printController, $action))
            {
                $printController->$action();
            }
            else
            {
                die("<h1>Metodo no definido - 404 Not Found</h1>");
            }
        }
    }
} else {
    $fullController = CONTROLLERS_DIR . $controller . "Controller.php";
    $controller = $controller . "Controller";

    // Si la variable ($controller) es un fichero lo requerimos
    if(is_file($fullController))
    {
        require_once ($fullController);
        $printController = new $controller();
    }
    else
    {
        die("<h1>Controlador no localizado - 404 Not Found</h1>");
    }

    // Si la variable ($action) contiene un número, llama a la clases necesarias para realizar acciones con clientes específos
    if (is_numeric($action)) {
        $action = (int)$action;
        if ($editAction != "" && $controller == "index.phpController") {
            //echo "Action: " . $action;
            $printController->$editAction($action);
        } else {
            $printController->viewProfile($action);
        }
    } else {
        //POR ALGUNA RAZON QUE DESCONOZCO, ACTION TOMA EL VALOR DE "index" CUANDO NO SE INSERTA NADA XD
        if ($action == "index" && $controller == "clientesController") {
            $printController->all();
        } else {
            $action = strtolower($action);
            // Si la variable $action es una función la ejecutamos o detenemos el script
            if(method_exists($printController, $action))
            {
                $printController->$action();
            }
            else
            {
                die("<h1>Metodo no definido - 404 Not Found</h1>");
            }
        }
    }
}


BaseLayout::renderFoot();