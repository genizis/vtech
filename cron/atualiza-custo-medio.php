<?php
$servername = "localhost";
$username = "shopfl06_shopflo";
$password = "S0F@st3r";
$dbname ="shopfl06_shop";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO historico_custo_medio (id_empresa, cod_produto, data_custo, custo_medio)
                SELECT produto.id_empresa, produto.cod_produto, CURDATE(), produto.custo_medio 
                FROM produto
                INNER JOIN empresa ON empresa.id_empresa = produto.id_empresa
                WHERE empresa.data_validade >= CURDATE()";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Cron executado sem erros";
} catch(PDOException $e) {
  echo "Cron executado com erros: " . $e->getMessage();
}

$conn = null;