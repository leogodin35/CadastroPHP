<?php
include_once("./model/dao/usuarioDAO.php");

class PainelController
{
    public function inicio()
    {
        $SessionIsAdmin = session::get("isadmin");
        $SessionNome = session::get("nome");

        include_once("./view/painel/Inicio.php");
    }

    public function listarUsuarios()
    {
    	$usuarioDAO = new usuarioDAO();
        $usuarios = $usuarioDAO->getAll();

        $SessionIsAdmin = session::get("isadmin");
        $SessionNome = session::get("nome");

        include_once("./view/painel/Inicio.php");
    }
}
