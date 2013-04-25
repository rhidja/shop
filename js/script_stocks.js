$(function(){
	
	// Loading pages =============================================
	// home
	
	$("#stockMontpellier").click(function(){ // 
		$("#content").load("stocks_montpellier.php",{orderby : 'nomProduit'});
	});
});
