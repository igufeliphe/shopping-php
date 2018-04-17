<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
include 'header.php';
?>

	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Detalhes do seus pedidos</h1>
						<hr/>
						<?php
							include_once("db.php");
							$cliente_id = $_SESSION["uid"];
							$pedidos_list = $pdo->query("SELECT o.pedido_id,o.cliente_id,o.produto_id,o.qty,o.trx_id,o.p_status,p.produto_nome,p.produto_preco,p.produto_image FROM pedidos o,produtos p WHERE o.cliente_id='$cliente_id' AND o.produto_id=p.produto_id");

							$query = $pedidos_list;
							if ($query->rowCount() > 0) {
								while ($row= $query->fetch(PDO::FETCH_OBJ)) {
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="produto_images/<?php echo $row->produto_image; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Produto Name</td><td><b><?php echo $row->produto_nome; ?></b> </td></tr>
													<tr><td>Produto Preço</td><td><b><?php echo "$ ".$row->produto_precos; ?></b></td></tr>
													<tr><td>Quantity</td><td><b><?php echo $row->qty; ?></b></td></tr>
													<tr><td>Transaction Id</td><td><b><?php echo $row->trx_id; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
















































