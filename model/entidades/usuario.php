<?php
class usuario{
	private $id = null;
	private $tipo = null;
	private $nome = null;
	private $login = null;
	private $senha = null;

	public function setId($id){
		$id = filter_var($id, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
		if (is_null($id) || $id <= 0) throw new Exception("O id deve ser numérico");
		$this->id = $id;
	}
	public function setTipo($tipo){
		$tipo = filter_var($tipo, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
		if (is_null($tipo) || $tipo <= 0) throw new Exception("O tipo deve ser numérico");
		$this->tipo = $tipo;
	}
	public function setNome($nome){
		if (!is_string($nome)) throw new Exception("O nome deve ser string");
		$this->nome = $nome;
	}
	public function setLogin($login){
		if (!is_string($login)) throw new Exception("O login deve ser string");
		$this->login = $login;
	}
	public function setSenha($senha){
		if (!is_string($senha)) throw new Exception("A senha deve ser string");
		$this->senha = sha1($senha);
	}

	public function getId(){
		return $this->id;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getIsAdmin(){
		return ($this->tipo == 1) ? true : false;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}

	private function returnArray($row){
		return array(
		"id" => $row->getId(),
		"tipo" => $row->getTipo(),
		"nome" => $row->getNome(),
		"login" => $row->getLogin(),
		"senha" => $row->getSenha()
		);
	}
	public function toArray($rs){
		if(is_array($rs)){
			foreach ($rs as $key => $row){
				$arr[$key] = $this->returnArray($row);
			}
		}else{
			$arr = $this->returnArray($rs);
		}
		return $arr;
	}
}
