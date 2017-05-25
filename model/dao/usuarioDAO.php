<?php
include_once("./model/conexao.php");
include_once("./model/entidades/usuario.php");

class usuarioDAO extends baseDAO{
	private $table = "usuarios";

	public function getAll() {
		$sql = "SELECT id,tipo,nome,login FROM ".$this->table;

		return $this->select($sql,null,'usuario');
	}

	public function validarLogin($login, $senha) {
		$sql = "SELECT id,tipo,nome FROM ".$this->table;
		$sql.= " WHERE login=? AND senha=?";
		$result = $this->select($sql,array($login, $senha),'usuario');

		if (count($result) == 0) {
			return false;
		} else {
			return $result;
		}
    }

	public function cadastrar(usuario $usuario) {
		$usuario->setTipo(2);//Básico

		$usuario = $usuario->toArray($usuario);
		$fields = array_diff($usuario, array(null));//Remove campos nulos

		//Montagem do SQL
		$sql = "INSERT INTO ".$this->table." (";
		$sql .= implode(",",array_keys($fields));
		$sql .= ") ";

		$values_bind = substr(str_repeat(",?",count($fields)),1);
		$sql .= "VALUES ($values_bind)";

		return $this->insert($sql,array_values($fields));
    }

	public function alterar(usuario $usuario) {
		$usuario = $usuario->toArray($usuario);
		$fields = array_diff_key($usuario, array('id'=>0));//Remove o campo de chave primaria
		$fields = array_diff($fields, array(null));//Remove campos nulos

		//Montagem do SQL
		$sql = "UPDATE ".$this->table.' SET ';
		$sql .= implode("=?,",array_keys($fields))."=?";
		$sql.= " WHERE id=?";

		$values = array_values($fields);
		$values[] = $usuario[key($usuario)];

		return $this->update($sql,$values);
	}

	public function deletar(usuario $usuario) {
		$values[] = $usuario->getId();

		//Montagem do SQL
		$sql = "DELETE FROM ".$this->table;
		$sql.= " WHERE id=?";

		return $this->delete($sql,$values);
	}
}
