<?php

	//require_once('includes/classes/class_db.php');
	require_once('includes/months.php');
	require_once('includes/db_conn.php');
	
	$sql_get_events = "SELECT * FROM events WHERE event_date >= NOW() ORDER BY event_date";
	
	//open database conn and run select query
  	//$db = new Database();
  	//$db->connect();
  	//$result_get_events = $db->query($sql_get_events);
  	//$db->disconnect();
  	
  	$result_get_events = $mysqli->query($sql_get_events);
  	//$events_array = $result_get_events->fetch_array();

?>

<?php include("includes/head_nav.php"); ?>
		
		
		
		<div id="content" class="text_main">
			<div id="subcontentleft">
			
				<div style="text-align: right; padding-right: 20px; padding-top: 30px;"><img src="images/head_cal.webp" width="180" height="20" border="0" alt=""></div>
				<div style="text-align: left; padding-left: 20px; padding-right: 20px;">
					
					<?php 
					
						$prev_month = 99;
						
						//for($i=0;$i<count($events_array);$i++){
						while ($row = mysqli_fetch_array($result_get_events, MYSQLI_ASSOC)) {
							$ts_pieces = explode(" ",$row['event_date']);
							$date = $ts_pieces[0];
							
							$date_pieces = explode("-",$date);
							
							$year = $date_pieces[0];
							$month = $months[intval($date_pieces[1])];
							$day = intval($date_pieces[2]);
							
							if($month != $prev_month){
							
					?>
						
								<p width="100%" style="background: #F9D588;" class="header"><?=$month?> <?=$year?>
					<?php
							}
					?>
								
								<ul>

									<li>
										<strong><?=$day?> de <?=strtolower($month)?></strong><br />
										<?=$row['event_description']?>
									</li>
								
								
								</ul>
					<?php
							if($month != $prev_month){
					?>
								</p>
					<?php
							}
							
							$prev_month = $month;
						}
					?>
					


				</div>
			</div>
			
					
			<div id="subcontentright">
				<div style="margin-top: 45px;"><img src="images/photo_cal.webp" width="246" height="382" border="0" alt=""></div>			
			</div>			
			
		</div>
		
		
		
				
	<?php include("includes/footer.php"); ?>	
		
		
	</div> <!-- close container -->
	
	
</body>
</html>
