<?php
session_start();
include "db.php";
if (isset($_POST["f_nome"])) {

	$f_nome = $_POST["f_nome"];
	$l_nome = $_POST["l_nome"];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$resenha = $_POST['resenha'];
	$nome = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	$sexo = $_POST['sexo'];
	$datanasc = $_POST['datanasc'];
	$cpf = $_POST['cpf'] + $_POST['cnpj'];
	$cep = $_POST['cep'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$estado = $_POST['estado'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$numerocasa = $_POST['numerocasa'];
	$complemento = $_POST['complemento'];

if(empty($f_nome) || empty($l_nome) || empty($email) || empty($senha) || empty($resenha) ||
	empty($cep) || empty($cpf) || empty($numerocasa)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Preencha todos os campos..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($nome,$f_nome)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_nome is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($nome,$l_nome)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Este $l_nome não é valido..</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Este $email não é valido</b>
			</div>
		";
		exit();
	}
	if(strlen($senha) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Senha muito pequena</b>
			</div>
		";
		exit();
	}
	if(strlen($resenha) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Senha muito pequena</b>
			</div>
		";
		exit();
	}
	if($senha != $resenha){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>As senhas não são semelhantes</b>
			</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Cep $mobile é invalido</b>
			</div>
		";
		exit();
	}
	/*if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}*/
	//existing email address in our database
	$sql = "SELECT cliente_id FROM cliente_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>O endereço de e-mail já não está disponível Tente outro endereço de e-mail</b>
			</div>
		";
		exit();
	} else {
		//$senha = md5($senha);
		$sql = "INSERT INTO `cliente_info` 
		(`cliente_id`,
		 `primeiro_nome`,
		 `ultimo_nome`,
		 `email`, 
		 `senha`,
		 `sexo`,
		 `dataNasc`,
		 `cpf`,
		 `cep`,
		 `telefone`,
		 `celular`,
		 `estado`,
		 `rua`,
		 `bairro`,
		 `numerocasa`,
		 `complemento`) 
		VALUES (
		NULL,
		'$f_nome',
		'$l_nome',
		'$email', 
		'$senha',
		'$sexo},
		'$datanasc',
		'$cpf',
		'$cep',
		'$telefone',
		'$celular',
		'$estado',
		'$rua',
		'$bairro',
		'$numerocasa'
		'$completo')";
		$run_query = mysqli_query($con,$sql);
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["nome"] = $f_nome;
		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE carrinho SET cliente_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND cliente_id = -1";
		if(mysqli_query($con,$sql)){
			echo "register_success";
			exit();
		}
	}
	}
	
}



?>






















































