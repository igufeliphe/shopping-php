<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
<?php

date_default_timezone_set('America/Sao_Paulo');


// En: End PHP Code
// Fr: Fin code PHP

session_start();
if(isset($_SESSION["uid"])){?> 



<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #37abe3;color: white;">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
		<div class="collapse navbar-collapse" id="collapse">


			<ul class="nav navbar-nav navbar-right" style="background-color: #37abe3;">
				<li ><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"> <span class="glyphicon glyphicon-shopping-cart"></span>Carrinho <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;background-color: #37abe3;" >
						<div class="panel panel-success" >
							<div class="panel-heading" style="background-color: #37abe3;color: white;">
								<div class="row">
									<!--<div class="col-md-3">Codigo</div>-->
									<div class="col-md-3">Imagem</div>
									<div class="col-md-3">Produto</div>
									<div class="col-md-3">Preço.</div>
									<div class="col-md-3"><a style="float:right;" href="carrinho.php" class="btn btn-default">Comprar <span class="glyphicon glyphicon-shopping-cart"></span></a></div>

								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<!--<div class="panel-footer" style="background-color: #37abe3;">Total: </div>-->
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><span class="glyphicon glyphicon-user"></span><?php echo "Olá,".$_SESSION["nome"]; ?></a>
					<ul class="dropdown-menu" style="background-color: #37abe3;">
						<li><a href="carrinho.php" style="text-decoration:none; color:white;"><span class="glyphicon glyphicon-shopping-cart">Carrinho</a></li>
						<li class="divider"></li>
						<li><a href="pedidos.php" style="text-decoration:none; color:white;">Pedidos</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:white;">Alterar Senha</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:white;">Sair</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>




<p><br/></p>
	<p><br/></p>
	<p><br/></p>















<?php
}
else{
?>

<div class="wait overlay">
	<div class="loader"></div>
</div>

<div class="navbar navbar-fixed-top"  style="background-color: #37abe3;color: white;">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 
			</div>
		<div class="collapse navbar-collapse" id="collapse">


			<ul class="nav navbar-nav navbar-right" style="background-color: #37abe3;">
				<li ><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"> <span class="glyphicon glyphicon-shopping-cart"></span>Carrinho <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;background-color: #37abe3;" >
						<div class="panel panel-success" >
							<div class="panel-heading" style="background-color: #37abe3;color: white;">
								<div class="row">
									<!--<div class="col-md-3">Codigo</div>-->
									<div class="col-md-3">Imagem</div>
									<div class="col-md-3">Produto</div>
									<div class="col-md-3">Preço.</div>
									<div class="col-md-3"><a style="float:right;" href="carrinho.php" class="btn btn-default">Comprar <span class="glyphicon glyphicon-shopping-cart"></span></a></div>

								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<!--<div class="panel-footer" style="background-color: #37abe3;">Total: </div>-->
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><span class="glyphicon glyphicon-user"></span>Entrar</a>
					<ul class="dropdown-menu" style="background-color: #37abe3;">
						

						<div style="width:400px;">
							<div class=" panel-primary" style="background-color: #37abe3;">
								 
								<div class="panel-heading" style="background-color: #37abe3;">
									

									<form action="" method="POST">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/><br>
										<label for="email">Senha</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<button class="btn btn-default" style="float:right;"><a href="login.php" style="list-style: none;text-decoration-line: none;text-decoration-color: none;">Registrar-se</button>  
										<input type="submit" name="login" class="btn btn-default" style="float:right;"><br><br>
									</form>


								</div>
								<div class="panel-footer" id="e_msg"><a href="#" onclick="alert('Problema teu parceiro');" style="color:black; list-style:none;">Esqueci a senha</a></div>
							</div>
						</div>
					

					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>	

	<p><br/></p>
	<p><br/></p>
	<p><br/></p>













<?php } ?>

 <center> <img src="img/logo.png" height="150" width="750" ></center>
 <br>


	<div class="navbar" style="background-color: #37abe3;color: white;">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				 
			</div>
		<div class="collapse navbar-collapse" id="collapse" style="color:white;">
			<ul class="nav navbar-nav">
				<li><a href="index.php" style="color:white;"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
				<li><a href="index.php" style="color:white;"><span class="glyphicon glyphicon-modal-window"></span> Produto</a></li>
			</ul>
			
			<form class="navbar-form navbar-right">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Pesquisar.." id="search">
		        </div>
		        <button type="submit" class="btn btn-default" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
		     
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>


<!--<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Khan Store</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Inicio</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Produtos</a></li>
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>

		     -->























<?php 
if (isset($_POST['login'])) {
$pdo = new PDO("mysql:host=localhost;dbname=igo","root","vertrigo");
$email = $_POST["email"];
$senha = $_POST["password"];




$stmt = $pdo->query("SELECT * FROM cliente_info WHERE email = '$email' AND senha = '$senha'");
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0)
{
    echo "<script>alert('Dados incorretos..');</script>";
    exit;
}else{
	$row = $users[0];
	$_SESSION["uid"] = $row["cliente_id"];
	$_SESSION["nome"] = $row["primeiro_name"];

	$ip_add = getenv("REMOTE_ADDR");
		
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					
					$verify_carrinho = $pdo->query("SELECT id FROM carrinho WHERE cliente_id = $_SESSION[uid] AND p_id = ".$product_list[$i]);
					$result  = $verify_carrinho;
					if($result->rowCount() < 1){
						
						$update_carrinho = $pdo->query("UPDATE carrinho SET cliente_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND cliente_id = -1");
						$update_carrinho->execute();
					}else{
						
						$delete_existing_product = $pdo->query("DELETE FROM carrinho WHERE cliente_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i]);
						$delete_existing_product->execute();
						
					}
				}
				setcookie("product_list","",strtotime("-1 day"),"/");
				header('location: carrinho.php');
				exit();
				
			}
}


 } ?>