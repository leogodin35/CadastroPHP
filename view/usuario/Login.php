<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
</head>
<body>
    <div id="form-container">
        <div class="panel" id="form-box">
            <?php if (!empty($SessionMensagem)): ?>
                <div class='well'><?=$SessionMensagem?></div>
            <?php endif; ?>

            <form action="/index.php?c=usuario&a=acessar" method="post" id="form-login">
                <h1 class="text-center">Login</h1>

                <div class="form-group">
                    <label class="sr-only" for="login">Usuário</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <input type="text" name="login" class="form-control" placeholder="Seu login de usuário" required value="<?=$SessionLogin?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="senha">Senha</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Entrar" class="btn btn-success form-control">
                </div>

                <div class="form-group">
                    Não é registrado? <a href="/index.php?c=usuario&a=cadastro">Crie uma conta</a>.
                </div>
            </form>
        </div>
    </div>
</body>
</html>