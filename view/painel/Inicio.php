<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/ajaxUpdateTipoUsuario.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index.php?c=painel&a=inicio">Aplicação MVC em PHP</a>
            </div>
            <div id="menu">
                <ul class="nav navbar-nav navbar-right">
                    <?php if (!empty($SessionNome)): ?>
                        <li><a href='#'>Olá, <?=$SessionNome?></a></li>
                    <?php endif; ?>
                    <?php if ($SessionIsAdmin): ?>
                        <li><a href="/index.php?c=painel&a=listarUsuarios">Gerenciar usuários</a></li>
                    <?php endif; ?>
                    <li><a href="/index.php?c=usuario&a=sair">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <?php if ($SessionIsAdmin && debug_backtrace()[1]['function'] == "listarUsuarios"): ?>
        <?php if (count($usuarios) > 0): ?>
            <table class="table table-hover">
                <thead>
                    <th class="cell1">Administrador</th>
                    <th>Nome</th>
                    <th>Login</th>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $key => $row): ?>
                            <tr>
                                <td class="text-center">
                                    <label>
                                        <input
                                            class="listarUsuarios"
                                            type="checkbox"
                                            value="<?=$row->getId();?>"
                                            <?=($row->getIsAdmin()) ? 'checked="checked"' : '';?>
                                            <?=($row->getId() == 1 || (session::get("isadmin") && $row->getId() == session::get("id"))) ? 'disabled="disabled"' : '';?>
                                        >
                                    </label>
                                </td>
                                <td><?=$row->getNome();?></td>
                                <td><?=$row->getLogin();?></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum usuário cadastrado</p>
        <?php endif; ?>
    <?php endif; ?>
    </div>
</body>
</html>