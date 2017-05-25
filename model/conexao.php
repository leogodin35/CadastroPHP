<?php
setlocale(LC_ALL, "pt_BR", "ptb");
// ini_set("default_charset","UTF-8");
// ini_set("default_charset","ISO-8859-1");
// header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL);

class conexao{
	private static $dbtype   = "mysql";
	private static $host     = "localhost";
	private static $port     = "3306";
	private static $user     = "root";
	private static $password = "1234";
	private static $db       = "teste";
	public  static $connect;

	/*Evita que a classe seja instanciada publicamente*/
	private function __construct() {}

	/*Evita que a classe seja clonada*/
	private function __clone() {}

	/* Método unserialize do tipo privado para prevenir a desserialização da instância dessa classe*/
	private function __wakeup() {}

	/*Metodo Singleton para criar a conexão com o banco de dados*/
	public static function getConnect() {
        if (!isset(self::$connect)) {
            try {
				self::$connect = new PDO(self::$dbtype.":host=".self::$host.";port=".self::$port.";dbname=".self::$db, self::$user, self::$password);
				// self::$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				// self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// self::$connect->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
			} catch (PDOException $e) {
				//se houver exceção, exibe
				die("Erro: <code>" . utf8_encode($e->getMessage()) . "</code>");
			}
        }

        return self::$connect;
    }
}

include_once("./model/dao/baseDAO.php");