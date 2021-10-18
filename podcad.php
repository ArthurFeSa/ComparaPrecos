<?php


$con=mysqli_connect('localhost', 'root', '');
mysqli_select_db($con,'comparapreços');

if(!$con){

       die('Erro ao conectar!'. mysqli_connect_error());
}

$insert="INSERT INTO produto (codProduto, nome_produto, valorProduto, qnt_estoque, marca_prod, fk_id_loja) VALUES ( '$_POST[codp]', '$_POST[nomep]', '$_POST[valorp]', '$_POST[quantp]', '$_POST[marcap]', '$_POST[chave]')";

if(mysqli_query($con, $insert)){

        echo "Seja Bem-Vindo";
        
        $resultado=mysqli_query($con, "SELECT * FROM produto");

        header("Location: index.html");
}else{

        echo ("||ERRO||" . mysqli_error($con));
        header("Location: produtocad.html");
}

mysqli_close($con);

?>
