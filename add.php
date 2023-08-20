<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar dados de usuário</title>
    </head>
    <body>
        <?php
            include_once("config.php");

            if (isset($_POST['Submit'])){
                $name = mysqli_real_escape_string($mysqli, $_POST['name']);
                $age = mysqli_real_escape_string($mysqli, $_POST['age']);
                $email = mysqli_real_escape_string($mysqli, $_POST['mail']);

                // Checagem de campos vazios
                if(empty($name)) {
                    echo "<font color='red'>Campo Nome está vazio!</font><br/>";
                }
                if(empty($age)) {
                    echo "<font color='red'>Campo Idade está vazio!</font><br/>";
                }
                if(empty($email)) {
                    echo "<font color='red'>Campo e-Mail está vazio!</font><br/>";
                }
                
                echo "<br/><a href='javascript:self.history.back();'>Retornar</a>";
            } else {
                $SQL = "INSERT INTO users (usr_nm, user_age, usr_email) VALUES ('$name', '$age','$email')";
                $result = mysqli_query($mysqli, $SQL);

                echo "<font color='green'>Registro do usuário '$name' adicionado com sucesso.";
                echo "<br/><a href='index.php'>Ver resultado</a>";
            }
        ?>
    </body>
</html>