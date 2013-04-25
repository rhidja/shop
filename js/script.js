$(function(){

	
	// Loading pages =============================================
	// home
	
	$("#idhome").click(function(){
		$("#content").load("article.php");
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
