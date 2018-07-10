<?php
	session_start();
	include 'utility.php';
	$board = array(
					array(3,3,3,3,3,3,3,1,3,3,3,3,3,3,3,3,1,3,3,3,3,3,3,3),
					array(3,0,0,0,0,0,0,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,3),
					array(3,0,0,0,0,0,0,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,3),
					array(3,0,0,0,0,0,2,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,3),
					array(3,1,1,1,1,1,1,1,1,2,0,0,0,0,0,1,1,0,0,0,0,0,0,3),
					array(1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,1,1,2,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,1,0,0,2,2,0,0,1,1,1,1,1,1,1,1,3),
					array(3,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
					array(3,0,0,0,0,0,2,1,1,3,3,3,3,3,1,1,1,1,1,1,1,1,1,3),
					array(3,0,0,0,0,0,0,1,1,3,3,3,3,3,1,1,0,2,0,0,0,0,0,3),
					array(3,0,0,2,0,0,1,1,1,3,3,3,3,3,1,1,0,0,0,0,0,0,0,3),
					array(3,1,1,1,1,1,1,1,1,3,3,3,3,3,1,1,0,0,0,0,0,0,0,3),
					array(3,2,0,0,0,0,1,1,1,3,3,3,3,3,1,1,2,0,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,1,3,3,3,3,3,1,1,0,0,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,1,3,3,3,3,3,1,1,0,0,0,0,0,0,0,3),
					array(3,0,0,0,0,2,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,3),
					array(3,1,1,1,1,1,1,1,0,2,0,0,0,0,2,0,1,1,1,1,1,1,1,1),
					array(1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,1,1,0,2,0,0,0,3),
					array(3,0,0,0,2,1,1,1,2,0,0,0,0,0,0,2,1,1,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,3),
					array(3,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,3),
					array(3,0,0,0,0,0,3,1,1,1,0,0,0,0,1,1,1,3,0,0,0,0,0,3),
					array(3,3,3,3,3,3,3,3,3,1,3,3,3,3,1,3,3,3,3,3,3,3,3,3),
				);	
	$room1 = array(
						array(6,3)
					);
	$room2 = array(
						array(9,4),
						array(11,6),
						array(12,6)
					);
	$room3 = array(
						array(17,5)											
					);
	$room4 = array(
						array(17,9),
						array(16,12)
					);
	$room5 = array(
						array(19,18)
					);
	$room6 = array(
						array(15,19),
						array(14,17),
						array(9,17),
						array(8,19)
					);
	$room7 = array(
						array(4,19)
					);
	$room8 = array(
						array(1,12),
						array(5,15)
					);
	$room9 = array(
						array(3,10),
						array(6,8)
					);	
	$size = 20;
	$size_w = $size+1;
	$width = $size_w*24;
	$height = $size_w*25;
	$pos_y_lib = $size_w*8;
	$pos_x_lib = $size_w*2;

	$pos_y_stu = $size_w*2;
	$pos_x_stu = $size_w*2.5;

	$pos_y_hall = $size_w*3;
	$pos_x_hall = $size_w*11.5;

	$pos_y_lou = $size_w*3;
	$pos_x_lou = $size_w*19;

	$pos_y_din = $size_w*12;
	$pos_x_din = $size_w*17.5;

	$pos_y_kit = $size_w*21;
	$pos_x_kit = $size_w*19.5;

	$pos_y_ball = $size_w*20;
	$pos_x_ball = $size_w*10.5;

	$pos_y_res = $size_w*21.5;
	$pos_x_res = $size_w*1.5;

	$pos_y_gam = $size_w*14;
	$pos_x_gam = $size_w*1.5;

	$color = unserialize($_COOKIE['color']);
	$name = unserialize($_COOKIE['name']);
	$card = unserialize($_COOKIE['card']);
	$number = $_COOKIE['number'];
	if(isset($_SESSION['start'])){
		$start = $_SESSION['start'];
		if($start) {
			unset($_SESSION['start']);
			$_SESSION['stage'] = 'start';
			$_SESSION['turn'] = 1;
			$turn = 1;
			$available = unserialize($_COOKIE['available']);
			$players = unserialize($_COOKIE['players']);
		}
	}
	else if(isset($_SESSION['stage'])){
		$change = false;
		$diced = false;
		$turn = $_SESSION['turn'];
		if(isset($_POST['change']))
			$change = $_POST['change'];
		if(isset($_POST['diced']))
			$diced = true;
		$player = -1;
		$players = unserialize($_COOKIE['players']);
		
		if($change) {			
			$player = $_POST['player'];
			$x = $_POST['x'];
			$y = $_POST['y'];							
			$index_x = pos_to_x($x,$size_w);
			$index_y = pos_to_x($y,$size_w);
			$index = array($index_x,$index_y);
			$players[$player-1][0] = $x;
			$players[$player-1][1] = $y;
			setcookie("players", serialize($players), time() + (86400 * 30), "/");			
		}
		else if($diced) {
			$num = rand(1,6);
			echo "dices:".$num;
			$_SESSION['stage'] = 'walking';
			setcookie("num", $num, time() + (86400 * 30), "/");
			header("Refresh:0");
			exit;

		}
		if($_SESSION['stage'] == 'start') {			
			$available = unserialize($_COOKIE['available']);					
			for($i = 0;$i < sizeof($available);$i++){
				if($available[$i] == $index) {						
					$available = removeElementArray($available,$i);
				}
			}				
			setcookie("available", serialize($available), time() + (86400 * 30), "/");	
			if($change)			
				$_SESSION['turn'] = ($_SESSION['turn'] % $number) + 1;
			$turn = $_SESSION['turn'];
			if($player == $number) {
				$_SESSION['stage'] = 'dice';
				header("Refresh:0");
				exit;
				//$_SESSION['act'] = 'dice';		
				//$distance = 5;
				//setcookie("distance", 6, time() + (86400 * 30), "/");	
			}
		}
		else if($_SESSION['stage'] == 'dice'){
			$dice = true;			
			if($_SESSION['turn'] == 1) {
				$rounds = $_COOKIE['rounds'];
				setcookie("rounds", $round + 1, time() + (86400 * 30), "/");
			}
		}
		else if($_SESSION['stage'] == 'walking') {						
			$available = array();
			$num = $_COOKIE["num"];		
			if($change)	{
				$num = $num - 1;
				setcookie("num", $num, time() + (86400 * 30), "/");
			}
			/*if($_SESSION['act'] == 'dice'){
				$_SESSION['turn'] = $_SESSION['turn'] ;
				$turn = $_SESSION['turn'];
				$next = $turn;
				$next_x = pos_to_x($players[$next-1][0],$size_w);
				$next_y = pos_to_y($players[$next-1][1],$size_w);
				$distance = 6;
				$_SESSION['act'] = 'walking';
				setcookie("distance", $distance, time() + (86400 * 30), "/");	
				if($next_x + 1 < 24 && ($board[$next_y][$next_x+1]==1 || $board[$next_y][$next_x+1]==2))
					array_push($available, array($next_x+1,$next_y));
				if($next_y + 1 < 25 && ($board[$next_y+1][$next_x]==1 || $board[$next_y+1][$next_x]==2))
					array_push($available, array($next_x,$next_y+1));
				if($next_x - 1 >= 0 && ($board[$next_y][$next_x-1]==1 || $board[$next_y][$next_x-1]==2))
					array_push($available, array($next_x-1,$next_y));
				if($next_y - 1 >= 0  && ($board[$next_y-1][$next_x]==1 || $board[$next_y-1][$next_x]==2))
					array_push($available, array($next_x,$next_y-1));
				
			}
			else if ($_SESSION['act'] == 'walking') {*/				
				$next_x = pos_to_x($players[$player-1][0],$size_w);
				$next_y = pos_to_y($players[$player-1][1],$size_w);
				if(in_array(array($next_x,$next_y),$room1)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=1");					
					exit;
				}
				if(in_array(array($next_x,$next_y),$room2)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=2");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room3)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=3");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room4)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=4");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room5)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=5");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room6)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=6");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room7)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=7");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room8)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=8");
					exit;
				}
				if(in_array(array($next_x,$next_y),$room9)) {
					$_SESSION['turn'] = $player;
					header("Location: room.php?room=9");
					exit;
				}
				
				$next_x = pos_to_x($players[$turn-1][0],$size_w);
				$next_y = pos_to_y($players[$turn-1][1],$size_w);
				if($next_x + 1 < 24 && ($board[$next_y][$next_x+1]==1 || $board[$next_y][$next_x+1]==2))
					array_push($available, array($next_x+1,$next_y));
				if($next_y + 1 < 25 && ($board[$next_y+1][$next_x]==1 || $board[$next_y+1][$next_x]==2))
					array_push($available, array($next_x,$next_y+1));
				if($next_x - 1 >= 0 && ($board[$next_y][$next_x-1]==1 || $board[$next_y][$next_x-1]==2))
					array_push($available, array($next_x-1,$next_y));
				if($next_y - 1 >= 0  && ($board[$next_y-1][$next_x]==1 || $board[$next_y-1][$next_x]==2))
					array_push($available, array($next_x,$next_y-1));

				if(in_array(array($next_x,$next_y),$room1)) {
					array_push($available, array(6,4));
					array_push($available,array(7,3));					
				}
				if(in_array(array($next_x,$next_y),$room2)) {
					array_push($available, array(9,4));
					array_push($available,array(11,7));
					array_push($available,array(12,7));
				}
				if(in_array(array($next_x,$next_y),$room3)) {
					array_push($available,array(16,5));
				}
				if(in_array(array($next_x,$next_y),$room4)) {
					array_push($available,array(17,8));
					array_push($available,array(15,12));
				}
				if(in_array(array($next_x,$next_y),$room5)) {
					array_push($available,array(19,17));
				}
				if(in_array(array($next_x,$next_y),$room6)) {
					array_push($available,array(16,19));
					array_push($available,array(14,16));
					array_push($available,array(9,16));
					array_push($available,array(7,19));

				}
				if(in_array(array($next_x,$next_y),$room7)) {
					array_push($available,array(5,19));
					array_push($available,array(4,18));
				}
				if(in_array(array($next_x,$next_y),$room8)) {
					array_push($available,array(1,11));
					array_push($available,array(6,15));
				}
				if(in_array(array($next_x,$next_y),$room9)) {
					array_push($available,array(3,11));
					array_push($available,array(7,8));
				}
				if($num == 0) {
					$_SESSION['turn'] = ($_SESSION['turn'] % $number) + 1;
					$_SESSION['stage'] = 'dice';
					header("Refresh:0");		
					exit;
				}
			//}
		}

	}
	else {
		header("Location: index.php");
		exit;
	}

	for($i=0;$i < sizeof($available);$i++) {
		$available[$i][0] = x_to_pos($available[$i][0], $size_w);
		$available[$i][1] = y_to_pos($available[$i][1], $size_w);
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="players">
			<h2>Accusation</h2>
			<?php
				for($i=0;$i < $number;$i++) {
					echo "<a href='accuse.php?player=$i'>";
					echo "<div style='vertical-align:middle;";
					if($i == $turn-1)
						echo "background-color:#77e569;border:1px black solid;";
					echo "' class='player'>";
					echo "<div style='background-color:".$color[$i].";width:".($size_w*2)."px;height:".($size_w*2)."px;' class='player_color'></div>";
					echo "<p class='player_text'>".$name[$i]."</p>";	
					echo "</div>";				
					echo "</a>";
				}
			?>
		</div>
		<?php
			createHandDropDown($card, $turn);		
			if($dice){
				echo "<form method='post'>";
				echo "<input type='hidden' name='diced' value='true' />";
				echo "<button style='background-color:none;border:0px;'><img style='width:60px;height:60px;' src='images/dice.png' /></button>";
				echo "</form>";
			}
			else if(isset($num)) {
				echo "<h2>$num step(s) left</h2>";
			}
		?>
		<div id="content">
			<?php

				for($i=0;$i<sizeof($board);$i++) {
					for($j=0;$j<sizeof($board[$i]);$j++) {
						if($board[$i][$j] == 3)
							echo "<div style='width:$size"."px;height:$size"."px' class='non'></div>";
						else if($board[$i][$j] == 2)
							echo "<img style='width:".($size_w)."px; height:".($size_w)."px;' src='images/door.png' />";
						else if($board[$i][$j] == 0)
							echo "<div style='width:$size"."px;height:$size"."px' class='room'></div>";
						else
							echo "<div type='submit' style='width:$size"."px;height:$size"."px' class='block'></div>";
					}
					echo "<br>";
				}
			
				echo "<div style='top:$pos_y_lib".px.";left:$pos_x_lib"."px;' id='study'>Library</div>";
				echo "<div style='top:$pos_y_stu".px.";left:$pos_x_stu"."px;' id='study'>Study</div>";
				echo "<div style='top:$pos_y_hall".px.";left:$pos_x_hall"."px;' id='study'>Hall</div>";
				echo "<div style='top:$pos_y_lou".px.";left:$pos_x_lou"."px;' id='study'>Lounge</div>";
				echo "<div style='top:$pos_y_din".px.";left:$pos_x_din"."px;' id='study'>Dinning Room</div>";
				echo "<div style='top:$pos_y_kit".px.";left:$pos_x_kit"."px;' id='study'>Kitchen</div>";
				echo "<div style='top:$pos_y_ball".px.";left:$pos_x_ball"."px;' id='study'>Ballroom</div>";
				echo "<div style='top:$pos_y_res".px.";left:$pos_x_res"."px;' id='study'>Restroom</div>";
				echo "<div style='top:$pos_y_gam".px.";left:$pos_x_gam"."px;' id='study'>Game Room</div>";

				for($i=0;$i < sizeof($available);$i++) {
					echo "<form method='post'>";
					echo "<input type='hidden' name='player' value='$turn' />";
					echo "<input type='hidden' name='x' value='".$available[$i][0]."' />";
					echo "<input type='hidden' name='y' value='".$available[$i][1]."' />";
					echo "<input type='hidden' name='change' value='true' />";
					echo "<input type='submit' value='' style='top:".$available[$i][1]."px".";left:".$available[$i][0]."px;width:$size_w"."px;height:$size_w"."px;' class='available'/>";
					echo "</form>";
				}

				for($i=0;$i < sizeof($players);$i++) {
					if($players[$i][0] != -1)
						echo "<div style='top:".$players[$i][1]."px;left:".$players[$i][0]."px;width:".$size_w."px;height:".$size_w."px;background-color:".$color[$i].";' id='player".($i+1)."'></div>";
				}
				
			?>

		</div>
	</body>
</html>