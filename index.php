<?php include 'header.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<!--<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading" style="background-color: #37abe3;color: white;">Produtos</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
					<style>
						.igu:hover{
							color:#37abe3;
							
							font-family: Arial;
						}
					</style>
					<script>
						function creditos() {
							alert("Desenvolvido pelo grupo Atom!\nTrabalho de conclusão de Curso - Extensão Etec Praia Grande.");
						}
var clockid=new Array()
var clockidoutside=new Array()
var i_clock=-1
var thistime= new Date()
var hours=thistime.getHours()
var minutes=thistime.getMinutes()
var seconds=thistime.getSeconds()
if (eval(hours) <10) {hours="0"+hours}
if (eval(minutes) < 10) {minutes="0"+minutes}
if (seconds < 10) {seconds="0"+seconds}
var thistime = hours+":"+minutes+":"+seconds

function writeclock() {
    i_clock++
    if (document.all || document.getElementById || document.layers) {
  clockid[i_clock]="clock"+i_clock
  document.write("<span id='"+clockid[i_clock]+"' style='position:relative'>"+thistime+"</span>")
    }
}

function clockon() {
    thistime= new Date()
    hours=thistime.getHours()
    minutes=thistime.getMinutes()
    seconds=thistime.getSeconds()
    if (eval(hours) <10) {hours="0"+hours}
    if (eval(minutes) < 10) {minutes="0"+minutes}
    if (seconds < 10) {seconds="0"+seconds}
    thistime = hours+":"+minutes+":"+seconds
    
    if (document.all) {
  for (i=0;i<=clockid.length-1;i++) {
      var thisclock=eval(clockid[i])
      thisclock.innerHTML=thistime
  }
    }

    if (document.getElementById) {
  for (i=0;i<=clockid.length-1;i++) {
      document.getElementById(clockid[i]).innerHTML=thistime
  }
    }
    var timer=setTimeout("clockon()",1000)
}
window.onload=clockon
					</script>
					

					<div class="panel-footer">&copy; Martec Empilhadeiras <?php  echo date("Y"); ?><i onload="setInterval('tempo();',1000)" onclick="creditos();" class="igu" style="padding-left: 700px;" href="#" title="Trabalho de conclusão de curso">Atom <script>writeclock();</script>
</i></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
















































