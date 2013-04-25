$(function(){
	
	$("#newCustomer").click(function(){ // Load editting form "newCustomer" to the "content" div.
		$("#content").load("customers.php");
	});
	
	$("#editCustomer").click(function(){ // Load editting form "editCustomer" to the "content" div.
		$("#content").load("customers_edit.php");
	});
	
	// Sort ==========================================================
	$("#viewCustomer").click(function(){ // 
		$("#content").load("customers_view.php",{orderby : 'firstNameCustomer'});
	});
	
	$("#TriFirstName").click(function(){ // 
		$("#content").load("customers_view.php",{orderby : 'firstNameCustomer'});
	});
	
	$("#TriLastName").click(function(){ // 
		$("#content").load("customers_view.php",{orderby : 'lastNameCustomer'});
	});
	
	
	//=========================================================
	// Customers ==============================================
	//=========================================================	
	
	$("#newCustomerForm_submit").click(function(){ // Submit "newCustomerForm" to create new customer.
		
		$.ajax({
			type:"POST", 
			data: $('#newCustomerForm').serialize(), 
			url:"customers_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});	
	//*
	$("#editCustomerForm_submit").click(function(){ // Submit "editCustomerForm".
		
		$.ajax({
			type:"POST", 
			data: $('#editCustomerForm').serialize(), 
			url:"customers_edit_view.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	//*/
	
	//*
	$("#editCustomerFormView_submit").click(function(){ // Submit "editCustomerForm".
		
		$.ajax({
			type:"POST", 
			data: $('#editCustomerFormView').serialize(), 
			url:"customers_edit_view_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	//*/	
	
	//*
		$("#editCustomerFormView_delete").click(function(){ // Submit "editCustomerForm".
		
		$.ajax({
			type:"POST", 
			data: $('#editCustomerFormView').serialize(), 
			url:"customers_edit_delete.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	//*/
	
});
