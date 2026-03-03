<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['msg_login'])) {
    unset($_SESSION['msg_login']);
}

$host = "localhost";
$user = "root"; 
$pass = "";
$db   = "loja";
$senhaHash = '';

$con = new mysqli($host, $user, $pass, $db);
if ($con->connect_error) {
    die("Erro ao conectar ao banco: " . $con->connect_error);
}

if (isset($_POST['sendEntrar'])) {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($email === '' || $senha === '') {
        $_SESSION['msg'] = "Preencha todos os campos!";
        $_SESSION['msg_tipo'] = "erro";
        header("Location: minha-conta.php?abrir=login");
        exit;
    }

    $sql = $con->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        $sql->bind_result($id, $nome, $senhaHash);
        $sql->fetch();

        if (password_verify($senha, $senhaHash)) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['nome_usuario'] = $nome;
            if (!empty($_SESSION['retorno_url'])) {
                $destino = $_SESSION['retorno_url'];
                unset($_SESSION['retorno_url']);
                header("Location: " . $destino);
            } else {
                header("Location: loja_virtual.php");
            }
            exit;
        }

        $_SESSION['msg'] = "Senha incorreta!";
        $_SESSION['msg_tipo'] = "erro";
        header("Location: minha-conta.php?abrir=login");
        exit;
    }

    $_SESSION['msg'] = "E-mail não encontrado!";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php?abrir=login");
    exit;
}

header("Location: minha-conta.php?abrir=login");
exit;
