<?php
    include_once ("configura.php");

    $QL = "SELECT * FROM users ORDER BY usr_id";

    if (isset($_POST["sobren"])){
        $QL = "SELECT * FROM users ORDER BY usr_last_nm";
    };

    if (isset($_POST["matr"])){
        $QL = "SELECT * FROM users ORDER BY usr_matr";
    };

    $result = mysqli_query($mysqli, $QL);
?>

<html>
    <head>
        <title>Pagina inicial para cadastros</title>
    </head> 
    <body>
        <a href = "index.html">Incluir novas informações de usuário</a><br/><br/>
        <form name="classificar" method="post" action="index.php">
            <table width='80%' border=0>
            <tr bgcolor='#CCCCCC'>
                <td>Nome</td>
                <td>Idade</td>
                <td>Matrícula</td>
                <td>Comandos</td>
            </tr>
            <?php 
            $quantos = 0;
            $soma_idades = 0;
            while ($res = mysqli_fetch_array($result)) { 
                $quantos++;
                $soma_idades += $res['usr_age'];
                echo "<tr>";
                echo "<td>".$res['usr_nm']." ".$res['usr_last_nm']."</td>";
                echo "<td>".$res['usr_age']."</td>";
                echo "<td>".$res['usr_matr']."</td>";	
                echo "<td><a href=\"edit.php?id=$res[usr_id]\">Editar</a> ";
                echo "| <a href=\"delete.php?id=$res[usr_id]\" "; //Destaque.
                echo "onClick=\"return confirm('Tem certeza que quer deletar do banco de dados?')\">Deletar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </table>
            <br/>
            <?php echo "Alunos cadastrados: ".$quantos; 
                if(isset($_POST["sobren"]) && $quantos!=0) {
                    $media_idade = $soma_idades / $quantos;
                    echo "<br />Média de idade: ".$media_idade;
                }
            ?>
            <br/>
            <h5>Qual vertente você quer classificar?</h5>
            <br />
            <input type="submit" id="sobren" 
                name="sobren" value="Sobrenome" />
            <br />
	    </form>
    </body>
</html>