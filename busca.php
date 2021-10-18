
<html>
    <head>
        <meta charset="UTF-8">
        <title>Compara Preços</title>
<link rel="stylesheet" type="text/css" href="Busca.css" media="screen">
<body>
<?php
include('conexao.php');    
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * FROM produto WHERE nome_produto LIKE '%$pesquisa%' OR marca_prod LIKE '%$pesquisa%'";
                
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {

                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <center>
                    <tr class="Produtinhos">
                        <td><?php echo $dados['nome_produto']; ?></td>
                        <td><?php echo $dados['marca_prod']; ?></td>
                        <td><?php echo '       R$'. $dados['valorProduto']; ?></td>
                        <br>
                    </tr>
                    <body>
                    </center>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
</body>
</html>


<body>