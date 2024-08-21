<?php
    include("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }

    
    if(isset($_POST['bt_senha'])){ 
        var_dump($_POST['bt_senha']);

        $senha = $_POST['bt_senha'];
        $rsenha = $_POST['bt_rsenha']; 

        $_SESSION["bt_name"] = $_POST['bt_senha'];

        if (isset($senha)){
            
            if($senha === $rsenha){
                /* Só vai executar os códigos abaixo
                se for VERDADEIRO. */ 
        
                $senha = password_hash($_POST['bt_senha'], PASSWORD_DEFAULT);
                //$senha = md5($_POST['bt_senha']);









                $nome = $_POST['bt_nome'];
                $email = $_POST['bt_email'];
                $rsenha = $_POST['bt_rsenha'];
                
    
                 $mysqli->query("INSERT INTO login (nome, email, senha, rsenha) values('$nome','$email','$senha','$rsenha')") or
                    die($mysqlierrno);
                
                
                //header("Location:banco.php"); /* Mudar de página */
                
        
            }else{
                
                /* else é o senão */
                /* Quando for falso executar os códigos
                abaixo: */
                $mensagem = "<div class='alert alert-danger mt-3'> Senha inválida </div>";
                
            }
        }
    }
    
    
    
    
   
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="container">
        <form class="form mt-5" method="post">
            <label for="">Nome:</label>
            <input type="text" class="input" placeholder="nome" name="bt_nome">
            <label for="">Email:</label>
            <input type="text" class="input" placeholder="email" name="bt_email">
            <label for="">Senha:</label>
            <input type="text" class="input" placeholder="senha" name="bt_senha">
            <label for="">Repita sua senha:</label>
            <input type="text" class="input" placeholder="rsenha" name="bt_rsenha">
            <button>cadastrar</button>
        </form>
    </div>
</body>

</html>