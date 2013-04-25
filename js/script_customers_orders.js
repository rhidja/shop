$(function(){
	
	$("#newOrderCustomer").click(function(){ // Load editting form "newCustomer" to the "content" div.
		$("#content").load("customers_orders.php");
	});
	
	$("#editOrderCustomer").click(function(){ // Load editting form "newCustomer" to the "content" div.
		$("#content").load("customers_orders_edit.php");
	});
	
	// Sort ==========================================================
	
	$("#viewOrderCustomer").click(function(){ // 
		$("#content").load("customers_orders_view.php",{orderby : 'numCommande'});
	});

	$("#TriNumCommandeClt").click(function(){ // 
		$("#content").load("customers_orders_view.php",{orderby : 'numCommande'});
	});

	$("#TriDateCommandeClt").click(function(){ // 
		$("#content").load("customers_orders_view.php",{orderby : 'dateCommande'});
	});
	
	$("#TriDateReceptionCommandeClt").click(function(){ // 
		$("#content").load("customers_orders_view.php",{orderby : 'dateReceptionCommande'});
	});
	
	$("#TriIdCustomer").click(function(){ // 
		$("#content").load("customers_orders_view.php",{orderby : 'idCustomer'});
	});
	
	//=========================================================
	// Customers ==============================================
	//=========================================================	
	
	$("#newCustomerOrderForm").submit(function(){ // Submit "newCustomerForm" to create new customer.
		
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"customers_orders_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});

	$("#editCustomerOrderForm").submit(function(){ // Submit "newCustomerForm" to create new customer.
		
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"customers_orders_edit_view.php",
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
	
	$("#editCustomerOrderViewForm_submit").click(function(){ // Submit "editCustomerForm".
		
		$.ajax({
			type:"POST", 
			data: $("#editCustomerOrderViewForm").serialize(), 
			url:"customers_orders_edit_view_post.php",
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
	
	$("#editCustomerOrderViewForm_delete").click(function(){ // Submit "editCustomerForm".
		
		$.ajax({
			type:"POST", 
			data: $("#editCustomerOrderViewForm").serialize(), 
			url:"customers_orders_edit_delete.php",
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
	$("#addItemOrderClt").click(function(){ // Add items to the list of an order and display them in "colisItemsList" table.
		$( "#addItemForm" ).dialog({	
			height: 300,
			width : 250,
			modal: true,
			buttons: {
				"Submit": function() {
				    var numCommande=$('#numCommande').val();
					var nomProduit=$('#nomProduit').val();
					var nomParfum=$('#nomParfum').val();
					var prixProduit=$('#prixProduit').val();
					var quantiteProduit=$('#quantiteProduit').val();
					var sdata = 'numCommande='+numCommande+'&nomProduit='+nomProduit+'&nomParfum='+nomParfum+'&prixProduit='+prixProduit+'&quantiteProduit='+quantiteProduit;
					
					$.ajax({
						type:"POST",
						data: sdata,
						url:"customers_orders_edit_items_list.php",
						success: function(data){
							$('#ordersItemsList').append('<tr><td><input type="checkbox"/></td><td>'+nomProduit+'</td><td>'+nomParfum+'</td><td>'+prixProduit+'</td><td>'+quantiteProduit+'</td></tr>');
						},
						error: function(){
							alert('Une erreur est survenue.');
						}
					});
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		return false;
	});	
	//*/
	//*
	$("#deleteItemOrderClt").click(function(){ // Supprimer un produit dans une liste d'un colis.
		$("input[type=checkbox]:checked").each( 
			function() {
				var nextTD = $(this).parent().next();
				var nextNextTD = nextTD.next();
				var numCommande = $("#numCommande");
				var sdata = "numCommande="+numCommande.val()+"&nomProduit="+nextTD.text()+"&nomParfum="+nextNextTD.text();
				$.ajax({
					type:"POST",
					data: sdata,
					url:"customers_orders_items_list_delete.php",
					success: function(data){
						// Rien.
					},
					error: function(){
						alert('Une erreur est survenue.');
					}
				});
			
				$(this).parent().parent().remove();
			}
		);
		return false;
	});		
	//*/
	
});
