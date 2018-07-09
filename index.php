<?php
	/*if(isset($_POST['change'])) {
		$change = $_POST['change'];
		if($change){*/
	session_start();
	include 'utility.php';
	if(isset($_GET['number'])){
		$number = $_GET['number'];
	}
	else
		$number = 3;
	$start_point = array(
							array(7,0),
							array(16,0),
							array(23,7),
							array(23,17),
							array(14,24),
							array(9,24),
							array(0,18),
							array(0,5),
						);
	$players = array();

	$cards = array('w1','w2','w3','w4','w5','w6','s1','s2','s3','s4','s5','s6','r1','r2','r3','r4','r5','r6','r7','r8','r9');
	$color = array('red','green','blue','black','#663300','purple');
	if(isset($_POST['start']) && $_POST['password'] == 'lionking') {
		$name = $_POST['player'];
		$number = sizeof($name);
		for($i = 0;$i < $number;$i++)
			array_push($players,array(-1,-1));
		$answer = array();
		$temp = rand(0,5);
		array_push($answer,$cards[$temp]);
		for($i=$temp;$i < sizeof($cards)-1;$i++) {
			$cards[$i] = $cards[$i+1];
		}
		unset($cards[sizeof($cards)-1]);	

		$temp = rand(5,10);
		array_push($answer,$cards[$temp]);
		for($i=$temp;$i < sizeof($cards)-1;$i++) {
			$cards[$i] = $cards[$i+1];
		}
		unset($cards[sizeof($cards)-1]);

		$temp = rand(10,18);
		array_push($answer,$cards[$temp]);
		for($i=$temp;$i < sizeof($cards)-1;$i++) {
			$cards[$i] = $cards[$i+1];
		}
		unset($cards[sizeof($cards)-1]);
		$card = array();
		for($i=0;$i<sizeof($name);$i++){
			$temp = array();
			for($j=0;$j<18/$number;$j++){
				$temp_index = rand(0,sizeof($cards)-1);
				array_push($temp,$cards[$temp_index]);
				for($k=$temp_index;$k < sizeof($cards)-1;$k++) {
					$cards[$k] = $cards[$k+1];
				}
				unset($cards[sizeof($cards)-1]);
			}
			array_push($card,$temp);
		}


		setcookie("available", serialize($start_point), time() + (86400 * 30), "/");
		setcookie("players", serialize($players), time() + (86400 * 30), "/");
		setcookie("name", serialize($name), time() + (86400 * 30), "/");
		setcookie("answer", serialize($answer), time() + (86400 * 30), "/");
		setcookie("card", serialize($card), time() + (86400 * 30), "/");
		setcookie("number", sizeof($name), time() + (86400 * 30), "/");
		setcookie("color", serialize($color), time() + (86400 * 30), "/");
		$_SESSION['start'] = true;

		header('Location: clue.php');
		exit;
		
	}
	if(isset($_POST['player'])) {
		$player_box = $_POST['player'];
	}
	else {
		$player_box = array();
		for($i = 0;$i < $number;$i++)
			 array_push($player_box,"Player ".($i+1));
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
			.navs {
				width:100%;
				text-align:center;
			}
			.nav{
				width:49%;
				margin:0px;
				display:inline-block;
				text-align:center;
				background-color: #a3a39e;

			}
			.nav:hover { 
    			background-color: #babab6;
			}
			a {
				text-align:center;
			}
			.textbox {
				margin:20px;
			}
			#content {
				border-radius: 20px;
				background-color: #cececc;
			}
			body {
				background-image: url("images/background.jpg");
			}
		</style>
	</head>
	<body>
		<div id='content'>
			<div class='navs'>
				<a href='?number=3'>
					<div class='nav'>
						<p>3 Players</p>
					</div>
				</a>
				<a href='?number=6'>
					<div class='nav'>
						<p>6 Players</p>
					</div>
				</a>
			</div>
			<form method="post" action="">
				<div class="textbox">
					Player 1
					<input type="textbox" name="player[]" <?php echo " value='".$player_box[0]."' "; ?> maxlength="10" required/>
				</div>
				<div class="textbox">
					Player 2
					<input type="textbox" name="player[]" <?php echo " value='".$player_box[1]."' "; ?> maxlength="10" required/>
				</div>
				<div class="textbox">
					Player 3
					<input type="textbox" name="player[]" <?php echo " value='".$player_box[2]."' "; ?> maxlength="10" required/>
				</div>
				<?php
					if($number == 6){
						echo "<div class='textbox'>";
						echo "Player 4";
						echo	"<input type='textbox' name='player[]' value='".$player_box[3]."' maxlength='10' required/>";
						echo "</div>";
						echo "<div class='textbox'>";
						echo	"Player 5";
						echo	"<input type='textbox' name='player[]' value='".$player_box[4]."' maxlength='10' required/>";
						echo "</div>";
						echo "<div class='textbox'>";
						echo	"Player 6";
						echo	"<input type='textbox' name='player[]' value='".$player_box[5]."' maxlength='10' required/>";
						echo "</div>";
					}
				?>
				<div class="textbox">
					Password
					<input type="password" name="password" required/><br>
					"lionking"
				</div>
				<input type="hidden" name="start" value="true" />
				<input type="submit" value="Let's go" />
			</form>
		</div><br>
		<?php
			for($i=0;$i <= 5;$i++) {
				codeToCard($cards[$i]);
			}
			echo "<br>";
			for($i=6;$i <= 11;$i++) {
				codeToCard($cards[$i]);
			}
			echo "<br>";
			for($i=12;$i <= 20;$i++) {
				codeToCard($cards[$i]);
			}
		?>
	</body>
</html>