<?php
session_start();
unset($_SESSION['pseudo']);
header('Location: /gregdamp/index.php');

?>