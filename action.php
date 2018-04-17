<style type="text/css">
	.btn-igu:hover{
		color:black;
		background-color: #37abe3;
		border-radius: 60px 60px 60px 60px;
	}
</style>

<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
$pdo = conectar();
if(isset($_POST["category"])){
	$rs = $pdo->query("SELECT * FROM categorias");
	
	echo "
		<div class='nav nav-pills nav-stacked' style='background-color: #37abe3;'>
			<li class='active'><a href='#' style='background-color: #37abe3;'><h4>Categorias</h4></a></li>
	";

	if($rs->rowCount() > 0){
		    while($listar = $rs->fetch(PDO::FETCH_OBJ)){
			$cid = $listar->cat_id;
			$cat_nome = $listar->cat_nome;
			echo "
					<li><a href='#' class='category' cid='$cid' style='color:white;'>$cat_nome</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$rs = $pdo->query("SELECT * FROM marcas");
	
	echo
	 "
	 <hr>
	
		<div class='nav nav-pills nav-stacked' style='background-color: #37abe3;'>
			<li class='active'><a href='#' style='background-color: #37abe3;'><h4>Marcas</h4></a></li>
	";
	if($rs->rowCount() > 0){
		while($listar = $rs->fetch(PDO::FETCH_OBJ)){
			$bid = $listar->marca_id;
			$marca_nome = $listar->marca_nome;
			echo "
					<li><a href='#' class='selectBrand' bid='$bid' style='color:white;'>$marca_nome</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = $pdo->query("SELECT * FROM produtos");
	
	$count = $sql->rowCount();
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}
if(isset($_POST["getProduct"])){
	$limit = 15;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$produto_query = $pdo->query("SELECT * FROM produtos LIMIT $start,$limit");
	
	if($produto_query->rowCount() > 0){
		while($row = $produto_query->fetch(PDO::FETCH_OBJ)){
			$pro_id    = $row->produto_id;
			$pro_cat   = $row->produto_cat;
			$pro_marca = $row->produto_marca;
			$pro_nome = $row->produto_nome;
			$pro_preco = $row->produto_preco;
			$pro_image = $row->produto_image;
			$valor = 'R$ '.number_format($pro_preco, 2, ',', '.');
			echo "
				<div class='col-md-4'>
							<div class='panel' >
								<div class='panel-heading' style='background-color: #37abe3;color:white;'>$pro_nome</div>
								<div class='panel-body'>
									<img src='produto_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading' style='background-color: #37abe3;color:white;'>$valor
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-default btn-xs'>Adicionar ao Carrinho</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM produtos WHERE produto_cat = '$id'";
	}
	else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM produtos WHERE produto_keywords LIKE '%$keyword%'";
	}
	
	$run_query = $pdo->query($sql);
	while($row= $run_query->fetch(PDO::FETCH_OBJ)){
			$pro_id    = $row->produto_id;
			$pro_cat   = $row->produto_cat;
			$pro_marca = $row->produto_marca;
			$pro_nome = $row->produto_nome;
			$pro_preco = $row->produto_preco;
			$pro_image = $row->produto_image;
			$valor = 'R$ '.number_format($pro_preco, 2, ',', '.');
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_nome</div>
								<div class='panel-body'>
									<img src='produto_images/$pro_image' style='width:160px; height:250px;'/>
								</div>
								<div class='panel-heading'>$valor
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-default btn-xs'>Adicionar ao carrinho</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$cliente_id = $_SESSION["uid"];

		$sql = $pdo->query("SELECT * FROM carrinho WHERE p_id = '$p_id' AND cliente_id = '$cliente_id'");
		
		$count = $sql->rowCount();
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto já foi adicionado ao carrinho, só aumentar a quantidade!<br>Continue Comprando =D</b>
				</div>
			";
		} else {
			$sql = $pdo->query("INSERT INTO `carrinho`
			(`p_id`, `ip_add`, `cliente_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$cliente_id','1')");

			if($sql){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto Adicionado..</b>
					</div>
				";
			}
		}
		}else{
			$sql = $pdo->query("SELECT id FROM carrinho WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND cliente_id = -1");
			//$query = mysqli_query($con,$sql);
			if ($sql->rowCount() > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>O Produto já está adicionado ao carrinho, Continue comprando..</b>
					</div>";
					exit();
			}
			$sql = $pdo->query("INSERT INTO `carrinho`
			(`p_id`, `ip_add`, `cliente_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')");

			if ($sql) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto foi adicionado com sucesso..</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//Count cliente carrinho item
if (isset($_POST["count_item"])) {
	//Quando o cliente está logado, contamos o número do item no carrinho usando o id da sessão do cliente
	if (isset($_SESSION["uid"])) {
		$sql = $pdo->query("SELECT COUNT(*) AS c_item FROM carrinho WHERE cliente_id = $_SESSION[uid]");
	}else{
		//Quando cliente não está logado então contamos número de item em carrinho usando clientes com endereço ip único
		$sql = $pdo->query("SELECT COUNT(*) AS c_item FROM carrinho WHERE ip_add = '$ip_add' AND cliente_id < 0");
	}
	//$query = $sql;
	$row = $sql->fetch(PDO::FETCH_OBJ);
	
//IGORIGOR

	//$sql->execute();
	//$sql->rowCount();
	echo $row->c_item;
	//echo $sql;
	exit();
}


//Obter carrinho Item Do banco de dados ao menu suspenso
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//Quando o cliente está logado, esta consulta será executada
		$sql = $pdo->query("SELECT a.produto_id,a.produto_nome,a.produto_preco,a.produto_image,b.id,b.qty FROM produtos a,carrinho b WHERE a.produto_id=b.p_id AND b.cliente_id='$_SESSION[uid]'");
	}else{
		//Quando o cliente está NAO logado, esta consulta será executada
		$sql = $pdo->query("SELECT a.produto_id,a.produto_nome,a.produto_preco,a.produto_image,b.id,b.qty FROM produtos a,carrinho b WHERE a.produto_id=b.p_id AND b.ip_add='$ip_add' AND b.cliente_id < 0");
	}
	$query = $sql;
	if (isset($_POST["getCartItem"])) {
		//exibir item do carrinho no menu suspenso
		if ($query->rowCount() > 0) {
			$n=0;
			while ($row= $query->fetch(PDO::FETCH_OBJ)) {
				$n++;
				$produto_id = $row->produto_id;
				$produto_nome = $row->produto_nome;
				$produto_preco = $row->produto_preco;
				$produto_image = $row->produto_image;
				$carrinho_item_id = $row->id;
				$qty = $row->qty;
				$valor = 'R$ '.number_format($produto_preco, 2, ',', '.');
				echo '
				<br>
					<div class="row">
						 
						<div class="col-md-3"><img class="img-responsive" src="produto_images/'.$produto_image.'" /></div>
						<div class="col-md-3" style="color:black;">'.$produto_nome.'</div>
						<div class="col-md-3" style="color:black;">'.$valor.'</div>
						
					</div><br><hr style="background-color:black;">';
				
			}
			?>
				<!--<a style="float:right;" href="carrinho.php" class="btn btn-default">Comprar <span class="glyphicon glyphicon-shopping-cart"></span></a>-->
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if ($query->rowCount() > 0) {
			//display cliente carrinho item com o botão "Pronto para finalizar compra" se o cliente não for logado
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row= $query->fetch(PDO::FETCH_OBJ)) {
					$n++;
					$produto_id = $row->produto_id;
					$produto_nome = $row->produto_nome;
					$produto_preco = $row->produto_preco;
					$produto_image = $row->produto_image;
					$carrinho_item_id = $row->id;
					$qty = $row->qty;
					$valor = 'R$ '.number_format($produto_preco, 2, ',', '.');

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$produto_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$produto_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$produto_id.'"/>
								<input type="hidden" name="" value="'.$carrinho_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="produto_images/'.$produto_image.'"></div>
								<div class="col-md-2">'.$produto_nome.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$produto_preco.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$produto_preco.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"></b><br>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '

					<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Finalizar Compra" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="igufeliphe@gmail.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = $pdo->query("SELECT a.produto_id,a.produto_nome,a.produto_preco,a.produto_image,b.id,b.qty FROM produtos a,carrinho b WHERE a.produto_id=b.p_id AND b.cliente_id='$_SESSION[uid]'");
							$query = $sql;
							while($row= $query->fetch(PDO::FETCH_OBJ)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row->produto_nome.'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row->produto_preco.'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row->qty.'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/backup/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/backup/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/backup/cancel.php"/>
									<input type="hidden" name="currency_code" value="BRL"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									
									<input class="btn-igu" style="float:right;margin-right:80px;width:150px;" type="image" name="submit"
										src="img/paypal.png" alt="PayPal Checkout"
										alt="PayPal - Seguro, pagamento facil pela internet">

									<input class="btn-igu" style="float:right;margin-right:80px;width:150px;" type="image" name="boleto"
										src="img/boleto.jpg" alt="PayPal Checkout"
										alt="Pagamento via boleto bancario">
								</form>';
				}
			}
	}
	
	
}

//remover carrinho
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = $pdo->query("DELETE FROM carrinho WHERE p_id = '$remove_id' AND cliente_id = '$_SESSION[uid]'");
	}else{
		$sql = $pdo->query("DELETE FROM carrinho WHERE p_id = '$remove_id' AND ip_add = '$ip_add'");
	}
	if($sql){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto removido do carrinho</b>
				</div>";
		exit();
	}
}


//atualiar carrinho
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = $pdo->query("UPDATE carrinho SET qty='$qty' WHERE p_id = '$update_id' AND cliente_id = '$_SESSION[uid]'");
	}else{
		$sql = $pdo->query("UPDATE carrinho SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'");
	}
	if($sql){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto atualizado!</b>
				</div>";
		exit();
	}
}




?>






