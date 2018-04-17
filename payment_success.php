<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

if (isset($_GET["st"])) {

	# code...
	$trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
		$c_amt = $_COOKIE["ta"];
	if ($p_st == "Completed") {

		

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM carrinho WHERE cliente_id = '$cm_user_id'";
		$query =$pdo->query($sql);
		if ($query->rowCount() > 0) {
			while ($row= $query->fetch(PDO::FETCH_OBJ)) {
			$product_id[] = $row->p_id;
			$qty[] = $row->qty;
			}

			for ($i=0; $i < count($product_id); $i++) { 
				$sql = $pdo->query("INSERT INTO pedidos (cliente_id,produto_id,qty,trx_id,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')");
				
			}

			$sql =$pdo->query("DELETE FROM carrinho WHERE cliente_id = '$cm_user_id'");
			if ($sql)) {
				

include 'header.php';
				?>
					

						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Obrigado </h1>
											<hr/>
											<p>Olá <?php echo "<b>".$_SESSION["nome"]."</b>"; ?>,Seu pagamento está sendo processado
											Assim que for concluido e atualizado sua compra do ID: <b><?php echo $trx_id; ?></b>, Vamos te informar!<br/>
											Você pode continuar comprando.. <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	}
}



?>

















































