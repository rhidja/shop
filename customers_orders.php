<?php
include_once("connex.php");
?>


<form id="newCustomerOrderForm" name="newCustomerOrderForm" class="form-horizontal"><legend>New customer order</legend>

	<div class="control-group">
		<label class="control-label" for="numCommande">Order's number</label>
		<div class="controls">
			<input type="text" name="numCommande" id="numCommande" placeholder="Parcel's Id" required aurofocus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="numeroColis">Parcel's code</label>
		<div class="controls">
			<input type="text" name="numeroColis" id="numeroColis" placeholder="Parcel's code"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="firstNameCustomer">First name</label>
		<div class="controls">
			<input type="text" id="firstNameCustomer" name="firstNameCustomer" placeholder="First name" required/>
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="lastNameCustomer">Last name</label>
		<div class="controls">
			<input type="text" id="lastNameCustomer" name="lastNameCustomer" placeholder="Last name"required/>
		</div>
    </div>

	<div class="control-group">
		<label class="control-label" for="dateCommande">Order date</label>
		<div class="controls">
			<div id="datetimepicker1" class="input-append">
				<input type="text" id="dateCommande" name="dateCommande" data-format="yyyy-MM-dd"></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="dateEnvoiCommande">Sent date</label>
		<div class="controls">
			<div id="datetimepicker1" class="input-append">
				<input type="text" id="dateEnvoiCommande" name="dateEnvoiCommande" data-format="yyyy-MM-dd"></input>
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
			<button type="newCustomerOrderForm_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>	
	</div>
</form>



<!--------------------------------------------------------------------------------------------->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers_orders.js"></script>