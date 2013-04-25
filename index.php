<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<!-- Bootstrap -->
	<link 	rel="stylesheet" href="css/bootstrap.css" />
	<link 	rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<link 	rel="stylesheet" href="css/darkstrap.css" />
	<link 	rel="stylesheet" href="css/style.css" />
    <title>Tammy's business</title>
</head>
<body>

	<div class="container">
		<header class="row">
			<?php include_once("header.php");?>
		</header>
		
		<section class="row">
			<article>
				<?php include_once("article.php");?>
			</article>
		</section>
            
		<footer class="row">
				<?php include_once("footer.php");?>
		</footer>
    </div>
	
	<!-- Script Jquery -->
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
	<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/script_orders.js"></script>
	<script type="text/javascript" src="js/script_products.js"></script>
	<script type="text/javascript" src="js/script_parcels.js"></script>
	<script type="text/javascript" src="js/script_customers.js"></script>
	<script type="text/javascript" src="js/script_stocks.js"></script>
	<script type="text/javascript" src="js/script_customers_orders.js"></script>
</body>
</html>
