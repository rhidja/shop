<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers.js"></script>

<form id="editCustomerForm" class="form-horizontal"><legend>Edit customer</legend>
	
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
		<div class="controls">
			<button type="submit" id="editCustomerForm_submit" class="btn"><i class="icon-search"></i>Search</button>
		</div>
    </div>
	
</form>