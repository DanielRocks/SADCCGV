<?php
session_start();
if(($_SESSION['gerencia'] < 2)){
  header("Location:./acessoImpedido.php");
  die();
  }
?>