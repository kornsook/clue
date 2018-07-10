<?php
	session_start();
	include 'utility.php';
	if($_COOKIE['kind'] == 3) {
		$leader = unserialize($_COOKIE['leader3']);	
	}
	else{
		$leader = unserialize($_COOKIE['leader6']);	
	}
	$leader = sortSecond($leader);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<h1>Leaderboard</h1>
	<div style='width:100%;' id='content'>
		<table style='width:100%;'>
			<tbody>
				<tr>
					<th>Name</th>
					<th>Rounds</th>
				</tr>
				<?php
					for($i=0;$i< sizeof($leader);$i++) {
						echo "<tr>";
						echo "<td style='border:2px black solid;text-align:center;'>".$leader[$i][0]."</td>";
						echo "<td style='border:2px black solid;text-align:center;'>".$leader[$i][1]."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table><br>
		<a href='index.php'><button>Restart</button></a><br>
	</div>

</body>
</html>