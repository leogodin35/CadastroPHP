<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/js/validar-cadastro.js"></script>
</head>
<body>
    <div id="form-container">
        <div class="panel" id="form-box">
            <?php if (!empty($SessionMensagem)): ?>
                <div class='well'><?=$SessionMensagem?></div>
            <?php endif; ?>

            <form action="/index.php?c=usuario&a=cadastrar" method="post" id="form-cadastro">
                <h1 class="text-center">Cadastre-se</h1>

                <div class="form-group">
                    <label class="sr-only" for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Seu nome" value="<?=$SessionNome?>">
                </div>

                <div class="form-group">
                    <label class="sr-only" for="login">Usuário</label>
                    <input type="text" name="login" id="login" class="form-control" placeholder="Seu login de usuário" value="<?=$SessionLogin?>">
                </div>

                <div class="form-group">
                    <label class="sr-only" for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" value="<?=$SessionSenha?>">
                </div>

                <div class="form-group">
                    <label class="sr-only" for="senha">Confirme a senha</label>
                    <input type="password" name="confirmasenha" class="form-control" placeholder="Confirme sua senha">
                </div>

                <div class="form-group">
                    <input type="submit" value="Cadastrar" id="btn-submit" class="btn btn-primary form-control">
                </div>

                <div class="form-group">
                    Já é registrado? <a href="/index.php?c=usuario&a=login">Efetue login</a>.
                </div>
            </form>
        </div>
    </div>
</body>
</html>