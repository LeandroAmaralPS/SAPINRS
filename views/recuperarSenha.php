<!doctype html>
<html>
    <head>    
      <link rel="stylesheet" type="text/css" href="../css/login.css">         
      <link rel="icon" type="img" href="../img/logo.png" />
    </head>    
    <body>      
    <div class="container" >    
    <a class="links" id="paralogin"></a>
     
    <div class="content">      
      <!--FORMULÁRIO DE RECUPERAR SENHA-->
      <div id="login">
        <form method="post" action="/SAPINRS/process/recuperarSenha.php">
          <h1>Recuperar a senha</h1> 
          <p> 
            <label for="cpf">CPF:</label>
            <input id="cpf" name="cpf" required="required" type="text" placeholder="Informe seu CPF:"/>
          </p>
           
          <p> 
            <label for="email_login">Seu e-mail:</label>
            <input id="email_login" name="email_login" required="required" type="email" placeholder="Informe seu e-mail:" /> 
          </p>           
          <p> 
            <input type="submit" value="Enviar" /> 
          </p>          
        </form>
      </div>
        </div>
    </body>    
</html>