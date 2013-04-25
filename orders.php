<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_orders.js"></script>
<?php
include_once("connex.php");
?>

<form id="newOrderForm" name="newOrderForm" class="form-horizontal"><legend>New order</legend>

	<div class="control-group">
		<label class="control-label" for="numCommande">Order's number</label>
		<div class="controls">
			<input type="text" name="numCommande" id="numCommande" placeholder="Parcel's Id" required aurofocus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="numeroColis">Parcel's code</label>
		<div class="controls">
			<input type="text" name="numeroColis" id="numeroColis" placeholder="Parcel's Id"/>
		</div>
	</div>
	

	<div class="control-group">
		<label class="control-label" for="dateCommande">Sent date</label>
		<div class="controls">
			<div id="datetimepicker1" class="input-append">
				<input type="text" id="dateCommande" name="dateCommande" data-format="yyyy-MM-dd"></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="dateReceptionCommande">Receved date</label>
		<div class="controls">
			<div id="datetimepicker2" class="input-append">
				<input type="text" id="dateReceptionCommande" name="dateReceptionCommande" data-format="yyyy-MM-dd"></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>



	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>	
	</div>
</form>
