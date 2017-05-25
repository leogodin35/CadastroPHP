<?php
class session {
	public static function set($chave, $nome) {
		$_SESSION[$chave] = $nome;
	}

	public static function get($chave, $filter = FILTER_SANITIZE_STRING, $options = null) {
		if (isset($_SESSION[$chave])) {
			return filter_var($_SESSION[$chave], $filter, $options);
		} else {
			return null;
		}
	}

	public static function _unset($arr){
		foreach ($arr as $key => $value) {
			unset($_SESSION[$value]);
        }
	}
}