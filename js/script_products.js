$(function(){
	$("#newItem").click(function(){ // Load "newItemForm" form.
		$("#content").load("items.php");
	});
	
	$("#editItem").click(function(){ // Load editting form "newParcel" to the "content" div.
		$("#content").load("items_edit.php");
	});
	
	//Sort ====================================================
	
	$("#viewItem").click(function(){ // 
		$("#content").load("items_view.php",{orderby : 'nomProduit'});
	});
	
	$("#TriNomProduit").click(function(){ // 
		$("#content").load("items_view.php",{orderby : 'nomProduit'});
	});
	
	$("#TriCategorie").click(function(){ // 
		$("#content").load("items_view.php",{orderby : 'typeProduit'});
	});
	
	$("#TriMarque").click(function(){ // 
		$("#content").load("items_view.php",{orderby : 'marqueProduit'});
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
});
