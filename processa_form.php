<h1>Processando Formulário</h1>

<p>
    <?php
    echo "O formulário foi processado às " . date("H:i, jS F");
    ?>
</p>

<?php 
if ($_POST["nome"])
{
    echo "xablau";
} else
{
    echo "oi";
}
?>
<h2>Dados recuperado</h2>
<p>Nome: <?php echo $_POST["nome"];?></p>
<p>E-mail: <?php echo $_POST["email"];?></p>
<p>Sexo: <?php echo $_POST["sexo"];?></p>
<p>Usuário: <?php echo $_POST["user"];?></p>
<p>Senha: <?php echo $_POST["senha"];?></p>