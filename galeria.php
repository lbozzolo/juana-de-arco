<?php include("includes/head_nav.php"); ?>
		
		
		
		<div id="content" class="text_main">
<center>
<?php
foreach (glob("galeria/*.jpeg") as $filename) { 
    echo "<img src='$filename' width = '50%' height= '50%' ><br> "; 
}
?>
	
</center>			
	
		
				
	<?php include("includes/footer.php"); ?>	
		
		
	</div> <!-- close container -->
	
	
</body>
</html>
