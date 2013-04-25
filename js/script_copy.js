$(function(){
	
    // Date time Pickers =========================================
	//*
	
	$('#datetimepicker21').datetimepicker({ // Parcel's received date
      pickTime: false
    });
	
	$('#datetimepicker11').datetimepicker({ // Parcel's order date
      pickTime: false
    });

	
	$('#datetimepicker31').datetimepicker({ // Order's's order date
      pickTime: false
    });

	$('#datetimepicker41').datetimepicker({ // Order's's order date
      pickTime: false
    });	
	//*/
	
	// Loading pages =============================================
	
	//home
	$("#idhome").click(function(){
		$("#content").load("article.php");
	});
	
	$("#newParcel").click(function(){ // Load "newParcel" form to the "content" div.
		$("#content").load("colis.php");
	});
	
	$("#editParcel").click(function(){ // Load the form "editParcel" to the "content" div
		$("#content").load("colis_edit.php");
	});
	
	$("#newOrder").click(function(){ // Load "newOrder" form, to edit new order.
		$("#content").load("orders.php");
	});
	
	$("#editOrder").click(function(){ // Load editOrder" form, to search un order by numOrder.
		$("#content").load("orders_edit.php");
	});
	
	$("#newItem").click(function(){ // Load "newItemForm" form.
		$("#content").load("items.php");
	});
	
	$("#editItem").click(function(){ // Load editting form "newParcel" to the "content" div.
		$("#content").load("items_edit.php");
	});
	$("#newCustomer").click(function(){ // Load editting form "newCustomer" to the "content" div.
		$("#content").load("customers.php");
	});
	$("#editCustomer").click(function(){ // Load editting form "editCustomer" to the "content" div.
		$("#content").load("customers_edit.php");
	});
	//=======================================================
	// Parcel ===============================================
	//=======================================================
	/*
	$("#colis_search").submit(function(){ // Search parcel.
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"colis_search_views.php",
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

	$("#newParcelForm").submit(function(){ 	// Submit the form "newParcelForm" to add new parcel
		$.ajax({
			type:'POST', 
			data: $(this).serialize(), 
			url:'colis_post.php',
			dataType : 'html',
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	
	$("#editParcelForm").submit(function(){ // Submit the form "editParcelForm" to apply changes to the parcel.
		$.ajax({
			type:'POST', 
			data: $(this).serialize(), 
			url:'colis_edit_views.php',
			dataType : 'html',
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editParcelFormViews_sbmt").click(function(){ // Apdate a parcel's information
		$.ajax({
			type:'POST', 
			data: $("#editParcelFormViews").serialize(), 
			url:'colis_edit_views_post.php',
			dataType : 'html',
			success: function(data){
				/*
				$( "#dialog-message-saved" ).dialog({// Une alerte, que l'enrigistrement des modfication ont bien ete sauvgardees.
					modal: true,
					buttons: {
						Ok: function() {
							$( this ).dialog( "close" );
						}
					}
				});
				//*/
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editParcelFormViews_delt").click(function(){ // Delete a parcel from database.
		$.ajax({
			type:'POST', 
			data: $("#editParcelFormViews").serialize(), 
			url:'colis_edit_delete.php',
			dataType : 'html',
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
	$("#addItemColis").click(function(){ // Add items to the list of a parcel and display them in "colisItemsList" table.
		$( "#addItemForm" ).dialog({	
			height: 240,
			width : 250,
			modal: true,
			buttons: {
				"Submit": function() {
					var idColis=$('#idColis').val();
					var nomProduit=$('#nomProduit').val();
					var nomParfum=$('#nomParfum').val();
					var quantiteProduit=$('#quantiteProduit').val();
					var sdata = 'idColis='+idColis+'&nomProduit='+nomProduit+'&nomParfum='+nomParfum+'&quantiteProduit='+quantiteProduit;
					$.ajax({
						type:"POST",
						data: sdata,
						url:"colis_edit_items_list.php",
						success: function(data){
							$('#colisItemsList').append('<tr><td><input type="checkbox"/></td><td>'+nomProduit+'</td><td>'+nomParfum+'</td><td>'+quantiteProduit+'</td></tr>');
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


	$("#deletItemColis").click(function(){ // Supprimer un produit dans une liste d'un colis.
		$("input[type=checkbox]:checked").each( 
			function() {
				var nextTD = $(this).parent().next();
				var nextNextTD = nextTD.next();
				var idColis = $("#idColis");
				//*
				$.ajax({
					type:"POST",
					data: "idColis="+idColis.val()+"&nomProduit="+nextTD.text()+"&nomParfum="+nextNextTD.text(),
					url:"colis_edit_items_list_delete.php",
					success: function(data){
						// Rien.
					},
					error: function(){
						alert('Une erreur est survenue.');
					}
				});
				$(this).parent().parent().remove();
				//*/
			}
		);
		return false;
	});
	
	
	//=========================================================
	// Orders =================================================
	//=========================================================
	
	$("#newOrderForm").submit(function(){ // Submit "newOrderForm" form to save the new order.
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"orders_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editOrderForm").submit(function(){ // Submit "editOrderForm" form to display order's information
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"orders_edit_views.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editOrderFormViews").submit(function(){ // Submit "editOrderFormViews" form to save changes for orders information.
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"orders_edit_views_post.php",
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
	$("#addItemOrders").click(function(){ // Add items to the list of an order and display them in "colisItemsList" table.
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
						url:"orders_edit_items_list.php",
						success: function(data){
							//$("#content").html(data);
							//alert("OK");
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
	
	$("#deleteItemOrders").click(function(){ // Supprimer un produit dans une liste d'un colis.
		$("input[type=checkbox]:checked").each( 
			function() {
				var nextTD = $(this).parent().next();
				var nextNextTD = nextTD.next();
				var numCommande = $("#numCommande");
				
				//*
				$.ajax({
					type:"POST",
					data: "numCommande="+numCommande.val()+"&nomProduit="+nextTD.text()+"&nomParfum="+nextNextTD.text(),
					url:"orders_edit_items_list_delete.php",
					success: function(data){
						// Rien.
					},
					error: function(){
						alert('Une erreur est survenue.');
					}
				});
				//*/
				$(this).parent().parent().remove();
			}
		);
		return false;
	});	

	
	//=========================================================
	// Items ==================================================
	//=========================================================
		
	// New Items
	$("#newItemForm_submit").click(function(){ // Submit "newItemForm" to create new item.
		
		$.ajax({
			type:"POST", 
			data: $('#newItemForm').serialize(), 
			url:"items_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	
	$("#editItemForm").submit(function(){ // Submit to display items form's fileds
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
			url:"items_edit_view.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editItemFormView_submit").click(function(){ //Apdate Items
		$.ajax({
			type:"POST", 
			data: $("#editItemFormView").serialize(), 
			url:"items_edit_view_post.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
	});
	
	$("#editItemFormView_delete").click(function(){ // Delete Items
		$.ajax({
			type:"POST", 
			data: $("#editItemFormView").serialize(), 
			url:"items_edit_delete.php",
			success: function(data){
				$("#content").html(data);
			},
			error: function(){
				$("#content").html('Une erreur est survenue.');
			}
		});
		return false;
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
	
	//=========================================================
	// Categorie ==============================================
	//=========================================================
	
	$("#addType").click(function(){ // Add new type.
		$( "#addTypeForm" ).dialog({
			height: 160,
			width : 250,
			modal: true,
			buttons: {
				"Submit": function() {
				    var val = $('#idTypeDialog').val();
					$.ajax({
						type:"POST",
						data: 'idTypeDialog='+val, 
						url:"categorie_post.php",
						success: function(data){
							$('#typeProduit').append('<option value="'+val+'">'+val+'</option>');
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

	//=========================================================
	// Brand ==================================================
	//=========================================================

	//*
	$("#addBrand").click(function(){ // Add new brand.
		$("#addBrandForm").dialog({
			height: 160,
			width : 250,
			modal: true,
			buttons: {
				"Submit": function() {
				    var val = $('#idBrandDialog').val();
					$.ajax({
						type:"POST",
						data: 'idBrandDialog='+val, 
						url:"brand_post.php",
						success: function(data){
							$('#marqueProduit').append('<option value="'+val+'">'+val+'</option>');
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

	//=========================================================
	// Perfums  ===============================================
	//=========================================================
	//*
	$("#addPerfum").click(function(){ 	// Add new perfum.
		$( "#addPerfumForm" ).dialog({
			height: 160,
			width : 250,
			modal: true,
			buttons: {
				"Submit": function() {
				    var val = $('#nomParfumDialog').val();
					$.ajax({
						type:"POST",
						data: 'nomParfumDialog='+val,
						url:"perfums_post.php",
						success: function(data){
							$('#nomParfum').append('<option value="'+val+'">'+val+'</option>');
							alert("Perfum saved");
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
	
	//==================================================================================
	//=== Connexion ====================================================================
	//==================================================================================
	
	//*
	$("#adminConnex").click(function(){ // Connexion de l'administrateur.
		$("#loginForm").dialog({
			height: 225,
			width : 450,
			modal: true
		});
		return false;
	});
});
