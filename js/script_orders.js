$(function(){
	
	// Date time Pickers =========================================
	//*
	
	$('#datetimepicker11').datetimepicker({ // Parcel's received date
      pickTime: false
    });
	
	$('#datetimepicker21').datetimepicker({ // Parcel's order date
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
	
	$("#newOrder").click(function(){ // Load "newOrder" form, to edit new order.
		$("#content").load("orders.php");
	});
	
	$("#editOrder").click(function(){ // Load editOrder" form
		$("#content").load("orders_edit.php");
	});
	
	$("#viewOrder").click(function(){ // view parcels
		$("#content").load("orders_view.php",{orderby : 'numCommande'});
	});
	
	//Faire le Tri ===============================================

	$("#TriNumCommande").click(function(){ // Sort by numCommande
		$("#content").load("orders_view.php",{orderby : 'numCommande'});
	});
	
	$("#TriCodeColis").click(function(){ // Sort by codeColis
		$("#content").load("orders_view.php",{orderby : 'codeColis'});
	});
	
	$("#TriDateCommande").click(function(){ // Sort by dateCommande
		$("#content").load("orders_view.php",{orderby : 'dateCommande'});
	});

	$("#TriDateReceptionCommande").click(function(){ // Sort by dateReceptionCommande
		$("#content").load("orders_view.php",{orderby : 'dateReceptionCommande'});
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
	
	$("#editOrderFormViews_sbmt").click(function(){ // Submit "editOrderFormViews" form to save changes for orders information.
		$.ajax({
			type:"POST", 
			data: $("#editOrderFormViews").serialize(), 
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
	
	$("#editOrderFormViews_delt").click(function(){ // Submit "editOrderFormViews" form to save changes for orders information.
		$.ajax({
			type:"POST", 
			data: $("#editOrderFormViews").serialize(), 
			url:"orders_edit_delete.php",
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
});
