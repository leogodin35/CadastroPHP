<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
include_once("./utils/input.php");
include_once("./utils/session.php");

$controller = isset($_GET["c"]) ? $_GET["c"] : "";

$acao = isset($_GET["a"]) ? $_GET["a"] : "";

if ($controller == "usuario") {
    include_once("controller/UsuarioController.php");

    $ctrl = new UsuarioController();
    switch($acao)
    {
        case "login":
            $ctrl->login();
            break;
        case "acessar":
            $ctrl->acessar();
            break;
        case "cadastro":
            $ctrl->cadastro();
            break;
        case "cadastrar":
            $ctrl->cadastrar();
            break;
        case "sair":
            $ctrl->sair();
            break;
        case "ajaxUpdateTipo":
            $ctrl->ajaxUpdateTipo();
            break;
    }
} else if ($controller == "painel") {
    include_once("./model/entidades/usuario.php");

    if (session::get("id") > 0) {
        include_once("controller/PainelController.php");

        $ctrl = new PainelController();
        switch ($acao) {
            case "inicio" :
                $ctrl->inicio();
                break;
            case "listarUsuarios":
                $ctrl->listarUsuarios();
                break;
        }
    } else {
        header("Location: /index.php");
    }
} else {
    include_once("controller/UsuarioController.php");

    $ctrl = new UsuarioController();
    $ctrl->login();
}
?>
