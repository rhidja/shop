<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers.js"></script>

<form id="newCustomerForm" class="form-horizontal"><legend>New customer</legend>
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
		<label class="control-label" for="emailCustomer">Email</label>
		<div class="controls">
			<input type="email" id="emailCustomer" name="emailCustomer" placeholder="ex@gmail.com"/>
		</div>
    </div>
	<div class="control-group">
		<label class="control-label" for="telCustomer1">Telephone 1</label>
		<div class="controls">
			<input type="text" id="telCustomer1" name="telCustomer1" placeholder="06.22.99.47.26"/>
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="telCustomer2">Telephone 2</label>
		<div class="controls">
			<input type="text" id="telCustomer2" name="telCustomer2" placeholder="06.22.99.47.26"/>
		</div>
    </div>
	
	<div class="control-group">
		<label class="control-label" for="adressCustomer">Adresse</label>
		<div class="controls">
			<textarea rows="3" id="adressCustomer" name="adressCustomer" placeholder="Adresse"></textarea>
		</div>
    </div>
    
	<div class="control-group">
		<div class="controls">
			<button type="submit" id="newCustomerForm_submit" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>
    </div>
</form>