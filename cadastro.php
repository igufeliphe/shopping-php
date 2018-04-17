<title>Registrar-se</title>
<?php
include 'header.php';
if (isset($_GET["register"])) {
	
	?>


	<div class="container-fluid">
		<br><div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<br><div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer SignUp Form</div>
					<div class="panel-body">
					
					<form id="signup_form" onsubmit="return false">
						<br><div class="row">
							<div class="col-md-4">
								<label for="f_name">Primeiro Nome</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="f_name">Ultimo Nome</label>
								<input type="text" id="l_name" name="l_name" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="f_name">Data de Nascimento</label>
								<input type="date" id="" name="datanas" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-12">
								<label for="email">E-mail</label>
								<input type="text" id="email" name="email" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-6">
								<label for="password">Senha</label>
								<input type="password" id="password" name="password" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="repassword">Confirmar Senha</label>
								<input type="password" id="repassword" name="repassword" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-6">
								<label for="repassword">CPF</label>
								<input type="text" id="cpf" name="cpf" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="repassword">CNPJ</label>
								<input type="password" id="repassword" name="repassword" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-6">
								<label for="address2">Telefone</label>
								<input type="text" id="ncasa" name="telefone" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="address2">Celular</label>
								<input type="text" id="complemento" name="celular" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-4">
								<label for="mobile">CEP</label>
								<input type="text" id="cep" name="cep" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="address2">Bairro</label>
								<input type="text" id="bairro" name="bairro" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="address2">Estado</label>
								<input type="text" id="estado" name="estado" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-12">
								<label for="address1">Rua</label>
								<input type="text" id="rua" name="rua" class="form-control">
							</div>
						</div>
						<br><div class="row">
							<div class="col-md-6">
								<label for="address2">Numero da Casa</label>
								<input type="text" id="ncasa" name="numerocasa" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="address2">Complemento</label>
								<input type="text" id="complemento" name="complemento" class="form-control">
							</div>
						</div>
						<p><br/></p>
						<br><div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Sign Up" type="submit" name="signup_button"class="btn btn-success btn-lg">
							</div>
						</div>
						
					</div>
					</form>
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



?>






















