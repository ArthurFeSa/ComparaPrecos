<?php
  include('conexao.php');

  if(isset($_POST['login']) || isset($_POST['senha'])) {
   
   if(strlen($_POST['login']) == 0) {
           echo "Preencha seu e-mail";
   }else if(strlen($_POST['senha']) == 0) {
           echo "Preencha sua senha";
   } else {

    $login= $mysqli->real_escape_string($_POST['login']);
    $senha= $mysqli->real_escape_string($_POST['senha']);

    $sql_code= "SELECT * FROM login WHERE login='$login' AND senha='$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
     
    $usuario = $sql_query->fetch_assoc();

     if(!isset($_SESSION)){
        session_start();
    }

    $_SESSION['ID'] = $usuario['ID'];
    $_SESSION['Login'] = $usuario['Login'];

    header("Location: index.html");

    } else {
    
    
    header("Location: erro.html");
    }
    
   }


  }
?>

	