<!doctype html>
<html>
    <head>    
        <link rel="stylesheet" type="text/css" href="../css/login.css">         
        <link rel="icon" type="img" href="../img/logo.png" />
    </head>       
    <body>      
<<<<<<< HEAD
        <div class="container" >    
            <a class="links" id="paralogin"></a>

            <div class="content">      
                <!--FORMULÁRIO DE LOGIN-->
                <div id="login">
                    <form method="post" action="/SAPINRS/controller/loginController.php">
                        <h1>Login</h1> 
                        <p> 
                            <label for="nome_login">Seu login</label>
                            <input id="nome_login" name="nome_login" required="required" type="text" placeholder="Login:"/>
                        </p>

                        <p> 
                            <label for="email_login">Sua senha</label>
                            <input id="email_login" name="email_login" required="required" type="password" placeholder="Senha:" /> 
                        </p>           
                        <p> 
                            <input type="submit" value="Logar" /> 
                        </p>       
                        <p class = "recuperaSenha">            
                            <a href="recuperarSenha.php"> Recuperar a senha:</a>
                        </p>     
                    </form>
                </div>
            </div>
=======
    <div class="container" >    
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post" action="">
          <h1>Login</h1> 
          <p> 
            <label for="nome_login">Seu login</label>
            <input id="nome_login" name="nome_login" required="required" type="text" placeholder="Login:"/>
          </p>
           
          <p> 
            <label for="senha">Sua senha</label>
            <input id="senha" name="senha" required="required" type="password" placeholder="Senha:" /> 
          </p>           
          <p> 
            <input type="submit" value="Logar" /> 
          </p>
          <p>            
            <a href="recuperarSenha.php"> Recuperar a senha:</a>
</p>     
        </form>
      </div>
        </div>
>>>>>>> bdb7bf79ff229bce656ed2223641b027aea3b269
    </body>    
</html>