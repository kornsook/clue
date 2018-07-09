<!DOCTYPE html>
<?php
	session_start();
	include 'utility.php';
	if(!isset($_SESSION['stage'])){
		header("Location: index.php");
		exit;
	}
	if(isset($_GET['player'])){
		$player = $_GET['player'];
		$name = unserialize($_COOKIE['name']);		
		$turn = $player + 1;
		$card = unserialize($_COOKIE['card']);
		setcookie("accuser", $player, time() + (86400 * 30), "/");
	}
	else {
		header("Location: index.php");
		exit;
	}
?>
<html>
	<head>
		<title>Accusation of <?php echo $name[$player]; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<?php createHandDropDown($card, $turn); ?>
		<div id="content">
			<form action="decision.php">
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
					<input type="radio" name="room" value="r1" checked>
					<?php codeToCard("r1"); ?>
					<input type="radio" name="room" value="r2" > 
					<?php codeToCard("r2"); ?>
					<input type="radio" name="room" value="r3">
					<?php codeToCard("r3"); ?>
					<input type="radio" name="room" value="r4">
					<?php codeToCard("r4"); ?>
					<input type="radio" name="room" value="r5">
					<?php codeToCard("r5"); ?>
					<input type="radio" name="room" value="r6">
					<?php codeToCard("r6"); ?><br>
					<input type="radio" name="room" value="r7">
					<?php codeToCard("r7"); ?>
					<input type="radio" name="room" value="r8">
					<?php codeToCard("r8"); ?>
					<input type="radio" name="room" value="r9">
					<?php codeToCard("r9"); ?>
				</div>
				<br>
				<input type="submit" class='button' value="Accuse!" /> 
			</form>	
			<a href="clue.php"> <button class='button'>Back</button></a>
		</div>
	</body>
</html>