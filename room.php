<?php
	session_start();
	include 'utility.php';
	if(!isset($_SESSION['stage'])){
		header("Location: index.php");
		exit;
	}
	if (isset($_GET['room'])){
		$room = $_GET['room'];
		$turn = $_SESSION['turn'];
		$card = unserialize($_COOKIE['card']);
		setcookie("room", $room, time() + (86400 * 30), "/");	
	}
	else if(isset($_GET['back'])){
		$back = true;
		$_SESSION['turn'] = $_SESSION['turn'] + 1;
		$_SESSION['stage'] = 'dice';
		header("Location: clue.php");
		exit;
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php createHandDropDown($card, $turn);?>
		<div id="content">
			<form action="room_result.php">
				<div id="weapon">
					<div class="header">Weapon</div>
					<input type="radio" name="weapon" value="w1" checked>
					<?php codeToCard("w1"); ?>
					<input type="radio" name="weapon" value="w2" > 
					<?php codeToCard("w2"); ?>
					<input type="radio" name="weapon" value="w3">
					<?php codeToCard("w3"); ?>
					<input type="radio" name="weapon" value="w4">
					<?php codeToCard("w4"); ?>
					<input type="radio" name="weapon" value="w5">
					<?php codeToCard("w5"); ?>
					<input type="radio" name="weapon" value="w6">
					<?php codeToCard("w6"); ?>
				</div>	
				<div id="suspect">
					<div class="header">Suspect</div>
					<input type="radio" name="suspect" value="s1" checked>
					<?php codeToCard("s1"); ?>
					<input type="radio" name="suspect" value="s2" > 
					<?php codeToCard("s2"); ?>
					<input type="radio" name="suspect" value="s3">
					<?php codeToCard("s3"); ?>
					<input type="radio" name="suspect" value="s4">
					<?php codeToCard("s4"); ?>
					<input type="radio" name="suspect" value="s5">
					<?php codeToCard("s5"); ?>
					<input type="radio" name="suspect" value="s6">
					<?php codeToCard("s6"); ?>
				</div>
				<div id="room">
					<div class="header">Room</div>
					<?php echo codeToCard("r".$room); ?>
					<input type='hidden' name='room' <?php echo " value='r".$room."' "; ?> />
				</div>
				<br>
				<input type="submit" class='button' value="Guess" /> 
			</form>	
			<a href="?back=true"> <button class='button'>Not Guess</button></a>
		</div>
	</body>
</html>