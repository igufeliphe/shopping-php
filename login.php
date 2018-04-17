<?php
include "db.php";

session_start();

if(isset($_POST["email"]) && isset($_POST["senha"])){
	$email = $_POST["email"];
	$senha = $_POST["password"];

	echo $email;
	
	$sql = $pdo->query("SELECT * FROM cliente_info WHERE email = '$email' AND senha = '$senha'");


	if($sql->rowCount() > 0)
{
		while($listar = $sql->fetch(PDO::FETCH_OBJ)){
		$_SESSION["uid"] = $row["cliente_id"];
		$_SESSION["name"] = $row["primeiro_nome"];
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
				//here we are destroying cliente cookie
				setcookie("product_list","",strtotime("-1 day"),"/");
				echo "carrinho_login";
				exit();
				
			}

			echo "login_success";
			exit();
		}
		}else{
			echo "<span style='color:red;'>Por favor, registre antes do login..!</span>";
			exit();
		}
	
}

?>