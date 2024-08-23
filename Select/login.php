<?php
    include("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }


    if(isset($_POST['bt_email'])){ 
        
        $email = $_POST["bt_email"];

        $senha = $_POST["bt_senha"];

        $sql = "SELECT * FROM login WHERE email = '$email' limit 1";

        $sql_exec = $mysqli->query($sql) or die ($mysqli->error);
        $usuario = $sql_exec ->fetch_assoc();

        //var_dump($usuario);

        if(password_verify($senha, $usuario['senha'])){

            $SESSION["nome"] = $usuario['nome'];
            header("location: pagina1.php");

        }else{

            echo("<script> alert( 'erro de senha')</script>");

    
        }


    }
    
    
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>


        <style>
        .form-box {
            max-width: 300px;
            background: #f1f7fe;
            overflow: hidden;
            border-radius: 16px;
            color: #010101;
            justify-content: center;
            }

                .form {
                position: center;
                display: flex;
                flex-direction: column;
                padding: 32px 24px 24px;
                gap: 16px;
                text-align: center;
                }

                /*Form text*/
                .title {
                font-weight: bold;
                font-size: 1.6rem;
                }

                .subtitle {
                font-size: 1rem;
                color: #666;
                }

                /*Inputs box*/
                .form-container {
                overflow: hidden;
                border-radius: 8px;
                background-color: #fff;
                margin: 1rem 0 .5rem;
                width: 100%;
                }

                .input {
                background: none;
                border: 0;
                outline: 0;
                height: 40px;
                width: 100%;
                border-bottom: 1px solid #eee;
                font-size: .9rem;
                padding: 8px 15px;
                }

                .form-section {
                padding: 16px;
                font-size: .85rem;
                background-color: #e0ecfb;
                box-shadow: rgb(0 0 0 / 8%) 0 -1px;
                }

                .form-section a {
                font-weight: bold;
                color: #0066ff;
                transition: color .3s ease;
                }

                .form-section a:hover {
                color: #005ce6;
                text-decoration: underline;
                }

                /*Button*/
                .form button {
                background-color: #0066ff;
                color: #fff;
                border: 0;
                border-radius: 24px;
                padding: 10px 16px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: background-color .3s ease;
                }

                .form button:hover {
                background-color: #005ce6;
                }



                        .centralizado {
                            width: 300px;
                            height: 200px;
                            background-color: #4CAF50; /* Cor de fundo opcional */
                            color: white;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-align: center;
                            font-size: 20px;
                        }
                



                    </style>

</head>
<body>

<div class="form-box">
<form class="form mt-5" method="post">
    <span class="title">Cadastre seu login</span>
    <span class="subtitle">crie sua conta</span>
    <div class="form-container">
     
			<input type="email" class="input" placeholder="Ex:esmeralda1@gmail.com" required name= "bt_email">
			<input type="senha" class="input" placeholder="Senha" required name="bt_senha">
            
    </div>
    <button type="submit">cadastrar</button>
    <p class="signin">Já tem uma conta ? <a href="cadastro_login.php">Entrar</a> </p>
</form>
<div class="form-section">
  <p><a href=""></a> </p>
</div>
</div>
</body>
</html>