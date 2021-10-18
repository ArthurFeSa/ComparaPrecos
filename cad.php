<?php


$con=mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'comparapreços');

if(!$con){

       die('Erro ao conectar!'. mysqli_connect_error());
}

$insert="INSERT INTO login (login, senha) VALUES ( '$_POST[usuario]', '$_POST[senha]')";

if(mysqli_query($con, $insert)){

        echo "Seja Bem-Vindo";
        
        $resultado=mysqli_query($con, "SELECT * FROM login");

        header("Location: index.html");
}else{

        echo ("||ERRO||" . mysqli_error($con));
        header("Location: erro.html");
}

mysqli_close($con);

?>

