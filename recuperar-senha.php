<?php
session_start();
require_once("conexao.php");

// Verifica token na URL
if (!isset($_GET['token']) || empty($_GET['token'])) {
    $_SESSION['msg'] = "Token não fornecido ou inválido!";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php");
    exit;
}

$token = $_GET['token'];

try {
    // Verifica se token existe e não expirou
  $stmt = $conn->prepare("SELECT id FROM usuarios WHERE token_recuperacao = :token AND token_expira >= NOW() LIMIT 1");
$stmt->bindParam(':token', $token, PDO::PARAM_STR);
$stmt->execute();


    if ($stmt->rowCount() === 0) {
        $_SESSION['msg'] = "Token inválido ou expirado!";
        $_SESSION['msg_tipo'] = "erro";
        header("Location: minha-conta.php");
        exit;
    }

} catch (PDOException $e) {
    error_log("Erro recuperar-senha.php: " . $e->getMessage());
    $_SESSION['msg'] = "Ocorreu um erro. Tente novamente.";
    $_SESSION['msg_tipo'] = "erro";
    header("Location: minha-conta.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br"> 
<head>
<meta charset="UTF-8">
<title>Redefinir senha</title>
</head>
<body>

<h2>Redefinir Senha</h2>

<form action="salvar-nova-senha.php" method="POST">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_QUOTES) ?>">
    
    <label>Nova senha:</label><br>
    <input type="password" name="senha" required minlength="6"><br><br>

    <label>Confirmar senha:</label><br>
    <input type="password" name="senha_confirm" required minlength="6"><br><br>

    <button type="submit">Salvar nova senha</button>
</form>

</body>
</html>
