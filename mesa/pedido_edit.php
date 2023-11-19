<?php
  session_start();
  if (!isset($_SESSION["id"])) {
      header("Location:../index.php");
?>
<script>
  alert("para continuar realize o login");
</script>
<?php
} 
   include('../connection.php');

   $id_pedido = $_GET["id"];
   $sqlProd = "SELECT * FROM produto;";
   $resultPord = $conn->query($sqlProd);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="novas_pedidoStyle.css">
    <link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon">
    <script src="MenuMesasScript.js" defer></script>
</head>
    <body>
    <a id="botaoVoltar" href="../mesa/menuMesas.php"><img src="../imagens/iconVoltar.png" alt="voltarHome" style="width: 40px; height: 40px"></a>
    
    <div id="menumessas">
        
        <div id="conteinerProdutos" style="width: 630px; height: 610px;">
          <?php
    if ($resultPord->num_rows > 0) {
        while ($row = $resultPord->fetch_assoc()) {
?>
            <div>    
                <?php  echo'<div class="boxProduto" id="boxProduto'.$row["id_produto"].'">'?>
                <?php echo'<h4>'.$row["tipo_produto"].'</h4>'?>
                    <?php echo'<p>'.$row["nome_produto"].'</p>'?>
                    <?php echo'<p>'.$row["valor_produto"].'</p>'?>
                    <div id="contButton">
                        <div>
                            <?php echo '<form method="post" action="pedido_edit_php.php">
                                        <input type="hidden" name="id_pedido" value="' . $id_pedido. '">
                                        <input type="hidden" name="id_prod" value="' . $row["id_produto"] . '">
                                        <button type="submit">Enviar pedido</button>    
                                         </form>';
                                         ?>
                        </div>
                    </div>
                </div>   
            </div>
<?php
        }
    }
?>