<?php

	require_once('includes/classes/class_db.php');
	require_once('includes/months.php');
	
	$sql_get_events = "SELECT * FROM events WHERE event_date >= NOW() ORDER BY event_date LIMIT 4";
	
	//open database conn and run select query
  	$db = new Database();
  	$db->connect();
  	$result_get_events = $db->query($sql_get_events);
  	$db->disconnect();

?>

<?php include("includes/head_nav.php"); ?>
		
		
		
		<div id="content" class="text_main">
			<div id="contentleft">
				<img src="images/photo_hom_left.webp" width="360" height="244" border="0" alt="juana de arco,escuela waldorf">
				<div style="text-align: right; padding-top: 20px" class="header">Cabeza, coraz&oacute;n y manos</div>
				<div style="text-align: justify; padding-left: 10px;">El Instituto Juana de Arco es una escuela de nivel inicial, primario y secundario que sostiene el impulso de la pedagog&iacute;a waldorf en la Ciudad de Buenos Aires. Trabaja en el logro de un arte pedag&oacute;gico que acompa&ntilde;e las etapas evolutivas del desarrollo del ni&ntilde;o de acuerdo con los principios de la Antroposof&iacute;a. Aspira a la plena realizaci&oacute;n del ser humano en libertad, seg&uacute;n el impulso del alma consciente llevado por Juana de Arco. 
				</div>
			
			</div>
			
			<div id="contentcenter">
				<div align="left" class="header">Eventos</div>	
				<div  align="left" style="background: #F9D588; min-height: 340px; padding: 10px;">
				
					<?php 
					
						$prev_month = 99;
						
						for($i=0;$i<count($result_get_events);$i++){
							$ts_pieces = explode(" ",$result_get_events[$i]['event_date']);
							$date = $ts_pieces[0];
							
							$date_pieces = explode("-",$date);
							
							$year = $date_pieces[0];
							$month = $months[intval($date_pieces[1])];
							$day = intval($date_pieces[2]);
					?>
					
							<p>
								<strong><?=$day?> de <?=strtolower($month)?></strong><br />
								<?=$result_get_events[$i]['event_description']?>
							</p>
               
					<?php
						}
					?>				
				

				
				
								
				

                
				</div>
			</div>
			
			<div id="contentright">
			<div style="text-align: center; padding-top: 20px" class="header">Secundaria</div>
				<div style="margin-top: 5px;"><img src="images/secundaria2.webp" width="344" height="238" border="0" alt="secundaria en juana de arco">

				<div style="text-align: justify; padding-right: 10px;"><br>Una vez m&aacute;s somos pioneros en la Ciudad Aut&oacute;noma de Buenos Aires en cuanto a hacer camino para que la pedagog&iacute;a Waldorf sea otra opci&oacute;n a elegir.
<br>La orientaci&oacute;n es Bachiller en Sociales y Humanidades e inicialmente los cursos se dictan en turno tarde.
<br>La admisi&oacute;n esta abierta a las familias que se sientan cercanas a la propuesta y que quieran formar parte de nuestra comunidad.
<p>"Lo que debe ser ense&ntilde;ado y educado deber&aacute; ser sacado solamente del conocimiento de los futuros hombres y de sus proyectos individuales." 
<br>Rudolf Steiner
</div>
			</div>			

					
			</div>			
			
			
		
		</div>
		
		
		
				
		<?php include("includes/footer.php"); ?>
				
			
		
		
	</div> <!-- close container -->
	
	
</body>
</html>
