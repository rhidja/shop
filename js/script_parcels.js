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
	
	$("#newParcel").click(function(){ // Load "newParcel" form to the "content" div.
		$("#content").load("colis.php");
	});
	
	$("#editParcel").click(function(){ // Load the form "editParcel" to the "content" div
		$("#content").load("colis_edit.php");
	});
	
	//Faire le Tri
	$("#viewParcel").click(function(){ // Sort by idColis
		$("#content").load("colis_view.php",{orderby : 'idColis'});
	});
	
	$("#TriIdColis").click(function(){ // Sort by idColis
		$("#content").load("colis_view.php",{orderby : 'idColis'});
	});
	
	$("#TriCodeColis").click(function(){ // Sort by codeColis
		$("#content").load("colis_view.php",{orderby : 'codeColis'});
	});
	
	$("#TriDateEnvoiColis").click(function(){ // Sort by dateEnvoiColis
		$("#content").load("colis_view.php",{orderby : 'dateEnvoiColis'});
	});
	
	$("#TriDateReceptionColis").click(function(){ // Sort by dateReceptionColis
		$("#content").load("colis_view.php",{orderby : 'dateReceptionColis'});
	});	
	
	//===========
	
	$("#newParcelForm").submit(function(){ 	// Submit the form "newParcelForm" in order to add new parcel
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
	
	$("#editParcelForm").submit(function(){ // Submit the form "editParcelForm" in order to apply changes to the parcel.
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
	
	$("#editParcelFormViews_sbmt").click(function(){ // update a parcel's information
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

});	