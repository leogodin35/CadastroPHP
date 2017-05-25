<?php
class input {
	public static function get($chave, $filter = FILTER_DEFAULT, $options = null) {
		return filter_input(INPUT_GET, $chave, $filter, $options);
	}

	public static function post($chave, $filter = FILTER_DEFAULT, $options = null) {
		return filter_input(INPUT_POST, $chave, $filter, $options);
	}
}