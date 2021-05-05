<div class="wrap cryptlog">

	<h1>CryptApi Callback Logs</h1>
	
	<br/>
	<br/>
	
	<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Time</th>
			<th>Contents</th>
		</tr>
	</thead>
	<?php
		global $wpdb;
		$table_values = $wpdb->prefix . "_cryptapi_logs";
		$sql = "SELECT * FROM $table_values";
		$results = $wpdb->get_results( $sql, OBJECT );
		if (count($results) <= 0) {
			echo "There is no data.";
		}
		else
		{
			foreach($results as $res){
				echo "<tr>";
					echo "<td>";
						echo $res->id;
					echo "</td>";
					echo "<td>";
						echo $res->time;
					echo "</td>";
					echo "<td>";
						echo $res->queries;
					echo "</td>";
				echo "</tr>";
			}
		}
	?>
	</table>
</div>