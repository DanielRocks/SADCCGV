<?php
if(($_SESSION['gerencia'] < 1)){
  header("Location:./acessoImpedido.php");
  die();
  }
?>