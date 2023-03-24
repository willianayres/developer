<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <link href="<?php pathStatic();?>styles/login.css" rel="stylesheet" />
        <title>Login na Rede Social</title>
    </head>
    <body>
        <aside>
            
        </aside>
        <section class="form-container">
            <div class="logo">
                <div class="wraper">
                    <img alt="logo" title="logo" src="<?php pathStatic();?>images/logo.svg" />
                    <p>Conecte-se com seus amigos e expanda seus aprendizados com a rede Social AW-Freela.</p>
                </div><!--wraper-->
            </div><!--logo-->
            <div class="form">
                <form method="post">
                    <h3>Faça seu login:</h3>
                    <input type="email" name="email" placeholder="E-mail..." />
                    <input type="password" name="password" placeholder="Senha..." />
                    <input type="hidden" name="login" value="logar" />
                    <input type="submit" name="send_login" value="Logar" />
                </form>
                <p><a href="<?php path();?>registrar">Criar Conta</a></p>
            </div><!--form-->
        </section><!--form-container-->
    </body>
</html>