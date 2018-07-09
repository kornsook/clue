<!DOCTYPE html>
<?php
	session_start();
	include 'utility.php';
	if(!isset($_SESSION['stage'])){
		header("Location: index.php");
		exit;
	}
	if(isset($_GET)){
		$weapon = $_GET['weapon'];
		$suspect = $_GET['suspect'];
		$room = $_GET['room'];
		$name = unserialize($_COOKIE['name']);
		$answer = unserialize($_COOKIE['answer']);
		$card = unserialize($_COOKIE['card']);
		$index_p = $_COOKIE['accuser'];
		$name_a = $name[$index_p];
		$number = $_COOKIE['number'];
		$won = false;
		if($answer[0] == $weapon && $answer[1] == $suspect && $answer[2] == $room) {
			$won = true;
		}
	}
?>
<html>
	<head>
		<title>Result</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<style>
			.lost {
				font-size:130px;
				color:#cc4d68;
				margin:20px 0px 40px 0px;
			}
			.won {
				font-size:130px;
				color:#f8fc14;
				margin:20px 0px 40px 0px;
			}
			.name {
				font-size:60px;
			}
	</style>
	<body <?php if($won) echo "style='background-color:#25d14d;'"; else echo "style='background-color:#c1173b;'"; ?> >
		<div id="content">
			<?php
				if($won){
					echo "<div class='name'>$name_a</div><br>";
					echo "<div class='won'>WON</div>";
					for($i=0;$i < sizeof($answer);$i++) {
						codeToCard($answer[$i]);
					}
					echo "<br>";
					echo "<a href='index.php'><button>Restart</button></a>";
					session_destroy();
				}
				else{					

					echo "<div class='name'>$name_a</div><br>";
					echo "<div class='lost'>LOST</div>";
					for($i=0;$i < sizeof($card[$index_p]);$i++) {
						codeToCard($card[$index_p][$i]);
					}
					echo "<br>";
					if($number == 2) {
						setcookie("accuser", 1-$index_p, time() + (86400 * 30), "/");
						echo "<a href='?weapon=".$answer[0]."&suspect=".$answer[1]."&room=".$answer[2]."'><button>See the winner</button></a>";
					}
					else {
						echo "<a href='clue.php'><button>Back to the game</button></a>";
						
						$players = unserialize($_COOKIE['players']);
						$color = unserialize($_COOKIE['color']);
						
						$name = removeElementArray($name,$index_p);
						$card = removeElementArray($card,$index_p);
						$color = removeElementArray($color,$index_p);
						$players = removeElementArray($players,$index_p);
						$number = $number - 1;
						
						if($_SESSION['turn'] > $index_p+1)
							$_SESSION['turn'] = $_SESSION['turn'] - 1;
						else if($_SESSION['turn'] == $index_p+1) {
							$_SESSION['turn'] = max($_SESSION['turn'] % $number,$_SESSION['turn'] % ($number+1));
							if($_SESSION['stage'] != 'start')
								$_SESSION['stage'] = 'dice';
						}

						setcookie("players", serialize($players), time() + (86400 * 30), "/");
						setcookie("name", serialize($name), time() + (86400 * 30), "/");
						setcookie("card", serialize($card), time() + (86400 * 30), "/");
						setcookie("number", sizeof($name), time() + (86400 * 30), "/");
						setcookie("color", serialize($color), time() + (86400 * 30), "/");
					}
				}					
			?>
		</div>
	</body>
</html>