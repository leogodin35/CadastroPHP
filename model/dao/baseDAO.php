<?php
abstract class baseDAO{
	private $conexao = null;

	public function __construct() {
		$this->conexao = conexao::getConnect();
	}

	/*Método select que retorna um VO ou um array de objetos*/
	public function select($sql,$params=null,$class=null) {
		$query = $this->conexao->prepare($sql);
		$query->execute($params);
		$arr = $query->errorInfo();

		if ($arr[0] <> "00000") {
			die(print_r($arr, true));
		} else {
			if (isset($class)) {
				$rs = $query->fetchAll(PDO::FETCH_CLASS,$class);
			} else {
				$rs = $query->fetchAll(PDO::FETCH_OBJ);
			}
		}

		return $rs;
    }

	/*Método insert que insere valores no banco de dados e retorna o último id inserido*/
	public function insert($sql,$params=null) {
		$query = $this->conexao->prepare($sql);
		$query->execute($params);
		$arr = $query->errorInfo();

		if ($arr[0] == ("00000" || "23000")) {
			return $this->conexao->lastInsertId();
		} else {
			die(print_r($arr, true));
		}
    }

	/*Método update que altera valores do banco de dados e retorna o número de linhas afetadas*/
	public function update($sql,$params=null) {
		$query = $this->conexao->prepare($sql);
		$query->execute($params);
		$arr = $query->errorInfo();

		if ($arr[0] <> "00000") {
			die(print_r($arr, true));
		} else {
			return $query->rowCount();
		}
    }

	/*Método delete que excluí valores do banco de dados retorna o número de linhas afetadas*/
	public function delete($sql,$params=null) {
		$query = $this->conexao->prepare($sql);
		$query->execute($params);
		$arr = $query->errorInfo();

		if ($arr[0] <> "00000") {
			die(print_r($arr, true));
		} else {
			return $query->rowCount();
		}
    }
}
