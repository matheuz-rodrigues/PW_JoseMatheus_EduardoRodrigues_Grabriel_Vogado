<?php
session_start();
session_destroy();
header("Location: area-aluno.php");
exit();
?>