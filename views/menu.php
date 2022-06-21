<link rel="stylesheet" href="/SAPINRS/css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <?php
        if( session_status() != PHP_SESSION_ACTIVE ){
            session_start();
        }
    ?>
<div id="super_header">
<?php 


    switch ($frame){ 
    
    case "inicial":  
    ?>

    <div class="header_1">
            <a href="index.php"><img src="./img/logo.png" alt="logo"></a>
            <?php
            echo '<div class="div_login">';
            
            if(!isset($_SESSION["logado"])){
                echo '<a href="/SAPINRS/views/login.php"><button class="btn_login">Acessar o portal</button></a>';
            } else { 
                echo '<a href="./controller/loginController.php"><button class="btn_login2">Deslogar</button></a>';
                echo '<a href="/SAPINRS/views/perfis/perfil_usuario.php"><button class="btn_login">Perfil</button></a>';
                if ($_SESSION['permissao'] != 'socio'){
                     echo '<a href="/SAPINRS/views/perfis/perfil_colaborador.php"><button class="btn_login3">Area do colaborador</button></a>';          
                }
            }
            echo '</div>';
            ?>
    </div>
    <div class="header_2">
        <div class="menu">
            <ul>
                <li><a href="views/locacoes/locacoes-list.php">Espaços locações</a></li>
                <li><a href="#">Associe-se</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Horários de atendimento</a></li>
                <!--<li>
                    <input class="pesquisar" placeholder="Pesquisar" type="text">
                </li>-->
            </ul>
        </div>
    </div>

<?php
        break;
    case "Locações":
        ?>
    <div class="small_header">
        <div>
            <label class="title"><?=$frame?></label>
        </div>
        <div class="center_div">
            <a href="/SAPINRS/index.php"><i class="fa fa-home" ></i></a>
        </div>
        <?php if(isset($_SESSION['logado'])){?>
            <div class="left_div">
                <label class="title"><?=$_SESSION['nome']?></label>
            </div>
        <?php } ?>
    </div>
<?php  
        break;
        
    case "usuario":
        ?>
    <div class="small_header">
        <div>
            <label class="title">Bem Vindo(a)</label>
        </div>
        <div class="center_div">
            <a href="/SAPINRS/index.php"><i class="fa fa-home"></i></a>
        </div>
            <div class="left_div">
                <label class="title"><?=$_SESSION['nome']?></label>
            </div>
    </div>
    <?php 
        break;
    
    case "colaborador":
         ?>
    <div class="small_header" style="background-color: aliceblue !important;" >
        <div>
            <label class="title" style="color: #41B8C0 !important;">Bem Vindo(a)</label>
        </div>
        <div class="center_div">
            <a href="/SAPINRS/index.php"><i class="fa fa-home" style="color: #41B8C0 !important;"></i></a>
        </div>
            <div class="left_div">
                <label class="title" style="color: #41B8C0 !important;"><?=$_SESSION['nome']?></label>
            </div>
    </div>
    <?php
    break; 
    }?>
</div>