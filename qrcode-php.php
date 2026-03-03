
<?php
// qrcode-php.php
// Recebe via GET ?text=...&size=300
$text = isset($_GET['text']) ? trim($_GET['text']) : 'https://exemplo.com';
$size = isset($_GET['size']) ? (int)$_GET['size'] : 300;
if ($size < 100) $size = 100;
if ($size > 1000) $size = 1000;

// codifica o texto
$txt = rawurlencode($text);

// URL do Google Chart API (gera QR)
$chartUrl = "https://chart.googleapis.com/chart?cht=qr&chs={$size}x{$size}&chl={$txt}&chld=L|1";

// redireciona para a imagem (proxy) — ou você pode baixar e re-exibir
header("Content-Type: ./img/qrcode.png");
readfile($chartUrl);
exit;
?>
