$(function(){
	
	//home
	$("#idhome").click(function(){
		$("#content").load("colis_search.php");
	});
	
	//=======================================================
	// Parcel ===============================================
	//=======================================================
	
	$("#newParcel").click(function(){ // Load "newParcel" form to the "content" div.
		$("#content").load("colis.php");
	});
	
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
	
	
	$("#editParcel").click(function(){ // Load the form "editParcel" to the "content" div
		$("#content").load("colis_edit.php");
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
	
	$("#editParcelFormViews").submit(function(){ // Edit and view parcel information
		$.ajax({
			type:'POST', 
			data: $(this).serialize(), 
			url:'colis_edit_views_post.php',
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
	
	/*
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
							$('#colisItemsList').append('<tr><td>'+nomProduit+'</td><td>'+nomParfum+'</td><td>'+quantiteProduit+'</td></tr>');
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
	// Orders =================================================
	//=========================================================
	
	$("#newOrder").click(function(){ // Load "newOrder" form, to edit new order.
		$("#content").load("orders.php");
	});
	
	$("#editOrder").click(function(){ // Load editOrder" form, to search un order by numOrder.
		$("#content").load("orders_edit.php");
	});
	
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
	
	/*
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
							$('#ordersItemsList').append('<tr><td>'+nomProduit+'</td><td>'+nomParfum+'</td><td>'+prixProduit+'</td><td>'+quantiteProduit+'</td></tr>');
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
	// Items ==================================================
	//=========================================================
	
	
	$("#newItem").click(function(){ // Load "newItemForm" form.
		$("#content").load("items.php");
	});
	
	$("#editItem").click(function(){ // Load editting form "newParcel" to the "content" div.
		$("#content").load("items_edit.php");
	});
	
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
	
	$("#editItemFormView_submit").click(function(){
		$.ajax({
			type:"POST", 
			data: $(this).serialize(), 
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
	
});
