<?php
	function x_to_pos($x, $size_w) {
		return $x*$size_w;
	}

	function y_to_pos($y, $size_w) {
		return $y*$size_w;
	}
	function pos_to_x($x, $size_w) {
		return $x/$size_w;
	}

	function pos_to_y($y, $size_w) {
		return $y/$size_w;
	}
	function Decode($code) {
		switch($code) {
			case "w1":
				return "Banana";
			case "w2":
				return "Knife";
			case "w3":
				return "Lamp";
			case "w4":
				return "Sword";
			case "w5":
				return "Poison";
			case "w6":
				return "Toothpick";
			case "s1":
				return "John";
			case "s2":
				return "Smith";
			case "s3":
				return "Ryan";
			case "s4":
				return "Micheal";
			case "s5":
				return "Sandy";
			case "s6":
				return "Raul";
			case "r1":
				return "Study room";
			case "r2":
				return "Hall";
			case "r3":
				return "Lounge";
			case "r4":
				return "Dinning Room";
			case "r5":
				return "Kitchen";
			case "r6":
				return "Ballroom";
			case "r7":
				return "Restroom";
			case "r8":
				return "Game room";
			case "r9":
				return "Library";		
		}
	}
	function codeToCard($code){
		switch($code) {
			case "w1":
				echo "<div class='card'>";
				echo	"<img src='images/w1.jpg' />";
				echo	"Banana";
				echo "</div>";
				break;
			case "w2":
				echo "<div class='card'>";
				echo	"<img src='images/w2.jpg' />";
				echo	"Knife";
				echo "</div>";
				break;
			case "w3":
				echo "<div class='card'>";
				echo	"<img src='images/w3.jpg' />";
				echo	"Lamp";
				echo "</div>";
				break;
			case "w4":
				echo "<div class='card'>";
				echo	"<img src='images/w4.png' />";
				echo	"Sword";
				echo "</div>";
				break;
			case "w5":
				echo "<div class='card'>";
				echo	"<img src='images/w5.jpg' />";
				echo	"Poison";
				echo "</div>";
				break;
			case "w6":
				echo "<div class='card'>";
				echo	"<img src='images/w6.jpg' />";
				echo	"Toothpick";
				echo "</div>";
				break;
			case "s1":
				echo "<div class='card'>";
				echo	"<img src='images/s1.jpg' />";
				echo	"John";
				echo "</div>";
				break;
			case "s2":
				echo "<div class='card'>";
				echo	"<img src='images/s2.jpg' />";
				echo	"Smith";
				echo "</div>";
				break;
			case "s3":
				echo "<div class='card'>";
				echo	"<img src='images/s3.jpg' />";
				echo	"Ryan";
				echo "</div>";
				break;
			case "s4":
				echo "<div class='card'>";
				echo	"<img src='images/s4.jpg' />";
				echo	"Michael";
				echo "</div>";
				break;
			case "s5":
				echo "<div class='card'>";
				echo	"<img src='images/s5.jpg' />";
				echo	"Sandy";
				echo "</div>";
				break;
			case "s6":
				echo "<div class='card'>";
				echo	"<img src='images/s6.jpg' />";
				echo	"Raul";
				echo "</div>";
				break;
			case "r1":
				echo "<div class='card'>";
				echo	"<img src='images/r1.jpg' />";
				echo	"Study room";
				echo "</div>";
				break;
			case "r2":
				echo "<div class='card'>";
				echo	"<img src='images/r2.jpg' />";
				echo	"Hall";
				echo "</div>";
				break;
			case "r3":
				echo "<div class='card'>";
				echo	"<img src='images/r3.jpg' />";
				echo	"Lounge";
				echo "</div>";
				break;
			case "r4":
				echo "<div class='card'>";
				echo	"<img src='images/r4.jpg' />";
				echo	"Dining room";
				echo "</div>";
				break;
			case "r5":
				echo "<div class='card'>";
				echo	"<img src='images/r5.jpg' />";
				echo	"Kitchen";
				echo "</div>";
				break;
			case "r6":
				echo "<div class='card'>";
				echo	"<img src='images/r6.jpg' />";
				echo	"Ballroom";
				echo "</div>";
				break;
			case "r7":
				echo "<div class='card'>";
				echo	"<img src='images/r7.jpg' />";
				echo	"Restroom";
				echo "</div>";
				break;
			case "r8":
				echo "<div class='card'>";
				echo	"<img src='images/r8.png' />";
				echo	"Game room";
				echo "</div>";
				break;
			case "r9":
				echo "<div class='card'>";
				echo	"<img src='images/r9.jpg' />";
				echo	"Library";
				echo "</div>";
				break;
		}
	}
	function removeElementArray($array, $index) {
		for($i = $index;$i < sizeof($array)-1;$i++) {
			$array[$i] = $array[$i+1];
		}
		unset($array[sizeof($array)-1]);
		return $array;
	}
	function createHandDropDown($card, $turn) {
		echo "<div class='dropdown'> ";
		echo	"<div id='viewcard'>";
		echo 	"<img style='max-width: 100%;max-height: 100%;' src='images/hand.jpg' />";
		echo 	"</div>";
		echo 	"<div class='dropdown-content'>";
		for($i=0;$i < sizeof($card[$turn-1]);$i++) {					
			codeToCard($card[$turn-1][$i]);					
		}
		echo	"</div>";
		echo "</div>";
	}
?>