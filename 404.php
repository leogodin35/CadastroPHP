<?php
header("HTTP/1.1 404 Not Found");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Erro 404 - Página não encontrada</title>
	<link rel="stylesheet" href="/assets/css/404.css">
</head>
<body>
	<div>
		<strong>404.</strong><span> Isso é um erro</span><br /><br />
		A URL solicitada <code><?=$_SERVER["REQUEST_URI"]?></code> não foi encontrada neste servidor<br /><br />
		<a href="http://www.localhost/">Retornar para o site</a>
	</div>
</body>
</html>