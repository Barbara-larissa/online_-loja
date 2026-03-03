<?php
session_start();
session_unset();
session_destroy();
header("Location: minha-conta.php");
exit;
?>
<?php
session_start();
session_destroy();
header("Location: minha-conta.php");
exit;
