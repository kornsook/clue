<?php
	session_start();
	include 'utility.php';
	$number = $_COOKIE['number'];
	if(!isset($_SESSION['stage'])){
		header("Location: index.php");
		exit;
	}
	if(isset($_GET['ready'])) {
		$ready = true;
		$show = false;
		$same_card = array();
		foreach($_GET as $key => $value) {
			if($key == 'ready')
				continue;
			array_push($same_card,$value);
		}
	}
	else if(isset($_GET['show'])){
		$show = true;
		$ready = true;
		$code = $_GET['code'];
	}
	else {
		$ready = false;
		$turn = $_SESSION['turn'];
		$weapon = $_GET['weapon'];
		$suspect = $_GET['suspect'];
		$room = $_GET['room'];
		$name = unserialize($_COOKIE['name']);
		$card = unserialize($_COOKIE['card']);
		$same_card = array();
		$player = -1;
		for($i=0;$i<sizeof($card)-1;$i++) {
			$temp = ($i+$turn)%sizeof($card);
			for($j=0;$j<sizeof($card[$temp]);$j++){
				if($card[$temp][$j] == $weapon)
					array_push($same_card,$weapon);
				else if($card[$temp][$j] == $suspect)
					array_push($same_card,$suspect);
				else if($card[$temp][$j] == $room)
					array_push($same_card,$room);
			}
			if(sizeof($same_card) != 0) {
				$player = $temp;
				break;
			}
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			<?php 
				if(!$ready) {
					echo "body {";
					echo "			vertical-align: middle;";
					echo "}";
				}
			?>
		</style>
	</head>
	<body >
		<?php
			if(!$ready) {
				echo "<div style='display:inline-block;'>";
				if($player == -1) {
					$_SESSION['turn'] = ($_SESSION['turn'] %$number)+1;
					$_SESSION['stage'] = "dice";
					echo "<h3> No one has them </h3>";					
					echo "<a href='clue.php'>Back</a>";
				}
				else {
					echo "<h3>Call $name[$player]</h3>";
					echo "<a class='button' href='?ready=true";
					for($i=0;$i < sizeof($same_card);$i++)
						echo "&c".$i."=".$same_card[$i];
					echo"'>Ready</a>";
				}
				echo "</div>";
			}
			else if($ready && !$show) {
				echo "<form>";
				echo "<div class='header'>Select a card to show</div>";
				for($i = 0;$i < sizeof($same_card);$i++) {
					$code = $same_card[$i];
					echo "<input type='radio' name='code' value='$code'";
					if($i == 0)
						echo "checked";
					echo "/>";
					codeToCard($code);
				}
				echo "<input type='hidden' name='show' value='true' /><br>";
				echo "<input type='submit' class='button' value='Show' />";
				echo "</form>";
			}
			else {
				$_SESSION['turn'] = ($_SESSION['turn'] %$number)+1;
				$_SESSION['stage'] = "dice";
				echo "<div class='header'>He/She has this card</div>";
				codeToCard($code);
				echo "<br>";
				echo "<a href='clue.php' class='button' >Back</a>";
			}
		?>
	</body>
</html>