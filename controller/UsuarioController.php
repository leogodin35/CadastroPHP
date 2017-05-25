<?php
include_once("./model/dao/usuarioDAO.php");

class UsuarioController
{
    public function cadastro()
    {
        $SessionMensagem = session::get("mensagem");
        $SessionNome = session::get("nome");
        $SessionLogin = session::get("login");
        $SessionSenha = session::get("senha");

        session::_unset(array("mensagem","nome","login","senha"));

        include_once("./view/usuario/Cadastro.php");
    }

    public function login()
    {
        $SessionMensagem = session::get("mensagem");
        $SessionLogin = session::get("login");

        session::_unset(array("mensagem","login"));

        include_once("./view/usuario/Login.php");
    }

    public function acessar()
    {
        try {
            $usuarioDAO = new usuarioDAO();
            $usuario = new usuario();

            $usuario->setLogin(input::post('login'));
            $usuario->setSenha(input::post('senha'));

            $rs_usuario = $usuarioDAO->validarLogin($usuario->getLogin(), $usuario->getSenha());
            if (!$rs_usuario) throw new Exception("Dados incorretos", 1);

            session::set("id", $rs_usuario[0]->getId());
            session::set("isadmin", $rs_usuario[0]->getIsAdmin());
            session::set("nome", $rs_usuario[0]->getNome());

            header("Location: /index.php?c=painel&a=inicio");
            die();
        } catch (Exception $e) {
            if ($e->getCode() == 1) session::set("login", $usuario->getLogin());
            session::set("mensagem", $e->getMessage());
            header("Location: /index.php?c=usuario&a=login");
            die();
        }
    }

    public function cadastrar()
    {
        $usuarioDAO = new usuarioDAO();
        $usuario = new usuario();

        try {
            $usuario->setNome(input::post('nome'));
            $usuario->setLogin(input::post('login'));
            $usuario->setSenha(input::post('senha'));

            if (input::post('senha') !== input::post('confirmasenha')) throw new Exception("As senhas devem ser iguais", 1);

            $rs = $usuarioDAO->cadastrar($usuario);
            if ($rs == 0) throw new Exception("Esse login está sendo utilizado por outro usuário", 2);

            $this->acessar();
        } catch (Exception $e) {
            if ($e->getCode() == (1 || 2)) {
                session::set("nome", $usuario->getNome());
                session::set("login", $usuario->getLogin());
                session::set("senha", input::post('senha'));
            }

            session::set("mensagem", $e->getMessage());
            header("Location: /index.php?c=usuario&a=cadastro");
            die();
        }
    }

    public function sair()
    {
        session_unset();
        header("Location: /index.php");
    }

    public function ajaxUpdateTipo()
    {
        try {
            $usuarioDAO = new usuarioDAO();
            $usuario = new usuario();

            $tipo = (input::post('tipo', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) ? 1 : 2 ;//Usuário administrador ou básico

            $usuario->setId(input::post('id'));
            $usuario->setTipo($tipo);

            if (!session::get("isadmin") || $usuario->getId() == 1) throw new Exception("Você não tem permissão para alterar esse usuário");

            echo $usuarioDAO->alterar($usuario);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
