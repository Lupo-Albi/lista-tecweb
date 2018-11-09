<h1>Processando Formulário</h1>

<p>
    <?php
    echo "O formulário foi processado às " . date("H:i, jS F");
    ?>
</p>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'lista';

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa conexão
if ($conn->connect_error)
{
    die ("Connection failed: " . $conn->connect_error);
}

echo "Conectado com sucesso.<br>";

$erro = '';

// Verifica se o POST tem algum valor
if (!isset($_POST) || empty($_POST))
{
    $erro = 'Nada foi postado.';
} else
{
    foreach ($_POST as $chave => $valor)
    {
        // Remove os espaços em branco do valor
        $$valor = trim($valor);

        if (empty($$valor))
        {
            $erro = 'Existem campos em branco.';
            break;
        }
    }    
    // Cria a query de inserção no BD
    $sql = "INSERT INTO teste (nome, email, sexo, user, senha) 
    VALUES ('$_POST[nome]','$_POST[email]', '$_POST[sexo]', '$_POST[user]', '$_POST[senha]')";

    if ($conn->query($sql) === TRUE)
    {
        echo "Novo registro adicionado com sucesso<br>";
    } else
    {
        $erro = "Erro: " . $sql . "<br>" . $conn->error;
    }
}

if ($erro)
{
    echo $erro;
    echo '<br>Preencha todos os campos do Formulário!<br>'; 
?>
    <a target="_self" href='http://localhost/lista/exercicio.html'>Volte ao formulário.</a>
<?php
} else
{
    $sql = "SELECT nome, email, sexo, user, senha FROM teste";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc())
        {
            echo "Nome: " . $row["nome"] . "<br>" .
            "Email: " . $row["email"] . "<br>" .
            "Sexo: " . $row["sexo"] . "<br>" .
            "User: " . $row["user"] . "<br>" .
            "Senha: " . $row["senha"] . "<br>";
        }
    } else
    {
        echo "Nenhum resultado";
    }
} 

$conn->close();
?>
