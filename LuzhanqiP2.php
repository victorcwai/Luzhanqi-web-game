<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<title>Lu Zhan Qi !</title>
	<head>
		<style>
			table {
			display: table;
			border-collapse: separate;
			border-spacing: 0px;
			border-color: gray;
			background-image: url("map.png");
			background-repeat: no-repeat;
			}
			body {
			background-color: lightgrey;
			font-family: Arial, Helvetica, sans-serif;
			}
			table, td {
			border: 0px dotted black;
			}
			td{
			width:85px;
			height: 38px;
			}
			td.hovered{
			background-color: rgba(60, 255, 4, 0.6);
			}
			div.pawn{
			background-color: lightblue; 
			width:80px; 
			height:30px; 
			border: 1px solid black;
			text-align: center;
			line-height: 30px;
			margin:auto;
			}
			div.enemy{
			background-color: black; 
			width:80px; 
			height:30px; 
			border: 1px solid red;
			text-align: center;
			line-height: 30px;
			color:white;
			margin:auto;
			}
			div.info{
			position: absolute;
			top:8px;
			left:820px;
			text-align:center;
			width:300px;
			background-color: white;
			border: 1px solid black;
			}
			div.frame{
			position: absolute;
			top:8px;
			left:1150px;
			text-align:left;
			width:500px;
			background-color: white;
			border: 1px solid black;
			padding: 10px;
			}
			#rules{
			visibility: hidden;
			}
			#history{
			width:294px;
			background-color: #FFCC99;
			height: 880px;
			overflow: scroll;
			}
			button{
			margin: auto;
			display: block;
			width: 140px;
			}
			#msg{
			width:294px;
			height: 60px;
			margin: 2px;
			background-color: #FFF788;
			border: 1px solid black;
			font-size: 17px;
			}
		</style>
		
	</head>
	<body>
		<table style = " width:802px; height:918px; text-align:center">
			<tr>
				<td class="cell" id = 0></td>
				<td class="cell" id = 1></td>
				<td class="cell" id = 2></td>
				<td class="cell" id = 3></td>
				<td class="cell" id = 4></td>
			</tr>
			<tr>
				<td class="cell" id = 10></td>
				<td class="cell" id = 11></td>
				<td class="cell" id = 12></td>
				<td class="cell" id = 13></td>
				<td class="cell" id = 14></td>
			</tr>
			<tr>
				<td class="cell" id = 20></td>
				<td class="cell" id = 21></td>
				<td class="cell" id = 22></td>
				<td class="cell" id = 23></td>
				<td class="cell" id = 24></td>
			</tr>
			<tr>
				<td class="cell" id = 30></td>
				<td class="cell" id = 31></td>
				<td class="cell" id = 32></td>
				<td class="cell" id = 33></td>
				<td class="cell" id = 34></td>
			</tr>
			<tr>
				<td class="cell" id = 40></td>
				<td class="cell" id = 41></td>
				<td class="cell" id = 42></td>
				<td class="cell" id = 43></td>
				<td class="cell" id = 44></td>
			</tr>
			<tr>
				<td class="cell" id = 50></td>
				<td class="cell" id = 51></td>
				<td class="cell" id = 52></td>
				<td class="cell" id = 53></td>
				<td class="cell" id = 54></td>
			</tr>
			<tr style = "height:55px;"><!--row7-->
				<td class="cell" id = 60></td>
				<td class="cell" id = 61></td>
				<td class="cell" id = 62></td>
				<td class="cell" id = 63></td>
				<td class="cell" id = 64></td>
			</tr>
			<tr>
				<td class="cell" id = 70></td>
				<td class="cell" id = 71></td>
				<td class="cell" id = 72></td>
				<td class="cell" id = 73></td>
				<td class="cell" id = 74></td>
			</tr>
			<tr>
				<td class="cell" id = 80></td>
				<td class="cell" id = 81></td>
				<td class="cell" id = 82></td>
				<td class="cell" id = 83></td>
				<td class="cell" id = 84></td>
			</tr>
			<tr>
				<td class="cell" id = 90></td>
				<td class="cell" id = 91></td>
				<td class="cell" id = 92></td>
				<td class="cell" id = 93></td>
				<td class="cell" id = 94></td>
			</tr>
			<tr>
				<td class="cell" id = 100></td>
				<td class="cell" id = 101></td>
				<td class="cell" id = 102></td>
				<td class="cell" id = 103></td>
				<td class="cell" id = 104></td>
			</tr>
			<tr>
				<td class="cell" id = 110></td>
				<td class="cell" id = 111></td>
				<td class="cell" id = 112></td>
				<td class="cell" id = 113></td>
				<td class="cell" id = 114></td>
			</tr>
			<tr>
				<td class="cell" id = 120></td>
				<td class="cell" id = 121></td>
				<td class="cell" id = 122></td>
				<td class="cell" id = 123></td>
				<td class="cell" id = 124></td>
			</tr>
		</table>
		<div class="info">
			<div id="msg">Swap the pawns to set up your army, then press START GAME.</div> 
			<br>
			<button id="start" type="button" onclick="start(this)">START GAME</button>
			<br>
			<button type="button" onclick="reset()">RESET</button>
			<br>
			<button id="load" type="button" onclick="load(this)">LOAD GAME</button>
			<br>
			<button id="showRule" type="button" onclick="showRule()">RULES</button>
			<br>
			<div class="pawn 1" id="P1-1">敵</div>
			<div class="pawn 1" id="P1-2">敵</div>
			<div class="pawn 1" id="P1-3">敵</div>
			<div class="pawn 2" id="P2-1">敵</div>
			<div class="pawn 2" id="P2-2">敵</div>
			<div class="pawn 2" id="P2-3">敵</div>
			<div class="pawn 3" id="P3-1">敵</div>
			<div class="pawn 3" id="P3-2">敵</div>
			<div class="pawn 3" id="P3-3">敵</div>
			<div class="pawn 4" id="P4-1">敵</div>
			<div class="pawn 4" id="P4-2">敵</div>
			<div class="pawn 5" id="P5-1">敵</div>
			<div class="pawn 5" id="P5-2">敵</div>
			<div class="pawn 6" id="P6-1">敵</div>
			<div class="pawn 6" id="P6-2">敵</div>
			<div class="pawn 7" id="P7-1">敵</div>
			<div class="pawn 7" id="P7-2">敵</div>
			<div class="pawn 8" id="P8-1">敵</div>
			<div class="pawn 9" id="P9-1">敵</div>
			<div class="pawn M" id="PM-1">敵</div>
			<div class="pawn M" id="PM-2">敵</div>
			<div class="pawn M" id="PM-3">敵</div>
			<div class="pawn B" id="PB-1">敵</div>
			<div class="pawn B" id="PB-2">敵</div>
			<div class="pawn F" id="PF-1">敵</div>
			<div class="enemy 1" id="E1-1">工兵</div>
			<div class="enemy 1" id="E1-2">工兵</div>
			<div class="enemy 1" id="E1-3">工兵</div>
			<div class="enemy 2" id="E2-1">排長</div>
			<div class="enemy 2" id="E2-2">排長</div>
			<div class="enemy 2" id="E2-3">排長</div>
			<div class="enemy 3" id="E3-1">連長</div>
			<div class="enemy 3" id="E3-2">連長</div>
			<div class="enemy 3" id="E3-3">連長</div>
			<div class="enemy 4" id="E4-1">營長</div>
			<div class="enemy 4" id="E4-2">營長</div>
			<div class="enemy 5" id="E5-1">團長</div>
			<div class="enemy 5" id="E5-2">團長</div>
			<div class="enemy 6" id="E6-1">旅長</div>
			<div class="enemy 6" id="E6-2">旅長</div>
			<div class="enemy 7" id="E7-1">師長</div>
			<div class="enemy 7" id="E7-2">師長</div>
			<div class="enemy 8" id="E8-1">軍長</div>
			<div class="enemy 9" id="E9-1">司令</div>
			<div class="enemy M" id="EM-1">地雷</div>
			<div class="enemy M" id="EM-2">地雷</div>
			<div class="enemy M" id="EM-3">地雷</div>
			<div class="enemy B" id="EB-1">炸彈</div>
			<div class="enemy B" id="EB-2">炸彈</div>
			<div class="enemy F" id="EF-1">軍旗</div>
		</div>
		<div class="frame" id="history"><p id="log" style="font-size: 20px; text-align:center">Message Log</p></div>
		<div class="frame" id="rules">
			<h1>Rules</h1>
			<p>Player should set up the board first. He/she can't see the set up of the enemy. The one who kill the enemy's flag first is the winner.</p>
			<h2>General rules modified from wiki:</h2>
			<li><b>工兵</b> can capture Landmines without being removed from the board.</li><br>
			<li><b>炸彈</b>, when in contact with any opponent piece, destroy both itself and the piece. They will be destroyed by the opponent's flag. 炸彈 CANNOT be placed on the front row during initial set-up.</li><br>
			<li><b>地雷</b>, when in contact with any opponent piece, destroy both itself and the piece (except when attacked by an 工兵). 地雷 MUST be placed on the last 2 ranks during set-up. 地雷 cannot move from its original position.</li><br>
			<li><b>軍旗</b> must be placed on one of the two Headquarters. It cannot move.</li><br>
			<li>Pieces can move one step to the 8 directions around at each round.</li><br>
			<li>Pieces on <b>Railroad</b> can move in straight line wihtout step limit if there is no obstacle.</li><br>
			<li>Pieces in <b>Campsite</b> cannot be attacked.</li>
			<h2>Ranking:</h2>
			<p>司令 > 軍長 > 師長 > 旅長 > 團長 > 營長 > 連長 > 排長 > 工兵</p><br>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript">			
			//Ally!!!???
			var gameStart = 0;
			var gameTurn = 1;
			var map = new Array(13);	//store class of pawn, allow comparison (battle) between pawns
			var locat = new Array(13);	//store id of pawn, for obtaining pawns' location
			var land = new Array(13);	//store the info about the location, etc. campsite, HQ, railroad
			var win = 0;
			var c;
			document.getElementById("rules").style.visibility = "hidden";
			
			function showRule(){
				if(document.getElementById("rules").style.visibility == "hidden")
				document.getElementById("rules").style.visibility = "visible";
				else
				document.getElementById("rules").style.visibility = "hidden";
			}
			
			function load(el){
				$.ajax({
					url: "loadSave.php",
					dataType: "text",
					cache: false,
					success: function(result){
						//reinitialize
						for (var i = 0; i < 13; i++) {
							map[i] = [0,0,0,0,0];
						}		
						for (var i = 0; i < 13; i++) {
							locat[i] = ["-5","-5","-5","-5","-5"];
						}		
						if(result != "Cannot read save.txt"){
							$('div.pawn,div.enemy').hide();
							pos = result.split(" ");
							var x,y;
							for(var i=0;i<pos.length-1;i+=2){ //[i+1] = cell id, [i] = pawn id
								document.getElementById(pos[i+1]).appendChild(document.getElementById(pos[i]));
								document.getElementById(pos[i]).style.display = "block";
								x = pos[i+1]%10;
								y = parseInt(pos[i+1]/10);
								map[y][x] = document.getElementById(pos[i]).classList[1];
								locat[y][x] = pos[i];
							}
							console.log(map);
							console.log(locat);
							$( "#msg" ).html("Save loaded!");
							$( "#log" ).after("Save loaded!<br><br>");
							document.getElementById("start").disabled = true;
							document.getElementById("load").disabled = true;
						}
						gameStart = 1;
					},
				});
			}
			
			window.setInterval(function(){
				if(gameStart == 1 && gameTurn == 1){
					//ajax request every second, ajax to php not text
					$.ajax({
						url: "readLzq.php",
						dataType: "text",
						cache: false,
						success: updateGame,
					})
				}
			}, 2000);
			
			$( init );
			
			function init() {
				boardInit();
				$('div.enemy').draggable({
					cursor:'move',
					start: dragging,
					revert: "invalid",
					stop: stopDragging,
				});
				$('td').droppable( {
					accept: 'div.enemy',
					hoverClass: 'hovered',
					drop: dropping
				});
				playerSetup();
			}
			
			function boardInit(){
				for (var i = 0; i < 13; i++) {
					map[i] = [0,0,0,0,0];
				}		
				for (var i = 0; i < 13; i++) {
					locat[i] = ["-5","-5","-5","-5","-5"];
				}		
				
				for (var i = 0; i < 13; i++) {
					if(i == 0 || i == 12){//HQ
						land[i] = ["0","HQ","0","HQ","0"];
						}else if (i == 2 || i == 4 || i == 8 || i == 10){//camp 1
						land[i] = ["0","CA","0","CA","0"];
						}else if (i == 3 || i == 9){//camp 2
						land[i] = ["0","0","CA","0","0"];
						}else if (i == 1 || i == 5 || i == 7 || i == 11){//railroad 1
						land[i] = ["RA","RA","RA","RA","RA"];
						}else{
						land[i] = ["0","0","0","0","0"];
					}
				}		
				for (var i = 1; i < 12; i++) {//railroad 2
					land[i][0] = "RA";
					land[i][4] = "RA";
				}
				land[6][2] = "RA";
				land[6][1] = "HILL";//hill
				land[6][3] = "HILL";
			}
			
			function dragging(event, ui){
				$( this ).css( "border", "2px solid #FF3300" );
				$( this ).css( "color", "#FF3300" );
				$( this ).css("opacity", "0.65");
			}
			
			function stopDragging(event, ui){
				$( this ).css( "border", "1px solid red" );
				$( this ).css("opacity", "1");
				$( this ).css( "color", "white" );
				$( this ).animate( {height: '28px', width: '74px'}, 150);
				$( this ).animate( {height: '30px', width: '80px'}, 150);
			}
			
			function dropping(event, ui){
				drop(ui.draggable,this.id);
				ui.draggable.position( { of: $(this), my: 'center', at: 'center'} );
			}
			
			function updateGame(data){
				if (gameTurn == 1){
					var strList = data.split(" ");
					//if it has been updated by p2
					if(strList[0] == '1'){
						//update the game
						var x,y,x2,y2;
						//strList[2] = prevLocat; strList[4] = droppedLocat (of enemy side)
						x = strList[2]%10;
						y = parseInt(strList[2]/10);
						x2 = strList[4]%10;
						y2 = parseInt(strList[4]/10);
						
						if(strList[3] == "-5"){ //both pawn die
							var pawn = document.getElementById(strList[4]).childNodes[0].textContent;
							document.getElementById(strList[2]).removeChild(document.getElementById(strList[2]).childNodes[0]);
							document.getElementById(strList[4]).removeChild(document.getElementById(strList[4]).childNodes[0]);
							map[y][x] = "0";
							map[y2][x2] = "0";
							locat[y][x] = "-5";
							locat[y2][x2] = "-5";
							$( "#msg" ).html("Both pawn (including your "+pawn+") die from the fight. Your turn now!");
							$( "#log" ).after("Both pawn (including your "+pawn+") die from the fight. Your turn now!<br><br>");							
							}else{ 
							//encounter+enemy win/encounter+enemy lose/just move
							if(document.getElementById(strList[4]).childNodes[0] == null){ //just move
								document.getElementById(strList[4]).appendChild(document.getElementById(strList[1]));
								map[y][x] = "0";
								map[y2][x2] = document.getElementById(strList[1]).classList[1];
								locat[y][x] = "-5";
								locat[y2][x2] = document.getElementById(strList[1]).id;
								$( "#"+strList[1] ).animate( {height: '28px', width: '74px'}, 150);
								$( "#"+strList[1] ).animate( {height: '30px', width: '80px'}, 150);
								$( "#msg" ).html("Enemy pawn just moved. Your turn now!");
								$( "#log" ).after("Enemy pawn just moved. Your turn now!<br><br>");
							}
							else if($("#"+strList[4]).children().attr('id') != strList[3]){ //encounter+enemy win
								var pawn = document.getElementById(strList[4]).childNodes[0].textContent;
								document.getElementById(strList[4]).removeChild(document.getElementById(strList[4]).childNodes[0]);
								setTimeout(function(){document.getElementById(strList[4]).appendChild(document.getElementById(strList[1]));},50);
								map[y][x] = "0";
								map[y2][x2] = document.getElementById(strList[1]).classList[1];
								locat[y][x] = "-5";
								locat[y2][x2] = document.getElementById(strList[1]).id;
								shake(document.getElementById(strList[1]));
								$( "#msg" ).html("Your "+pawn+" loses the fight. Your turn now!");
								$( "#log" ).after("Your "+pawn+" loses the fight. Your turn now!<br><br>");
								}else{ //encounter+enemy lose
								var pawn = document.getElementById(strList[4]).childNodes[0].textContent;
								document.getElementById(strList[2]).removeChild(document.getElementById(strList[2]).childNodes[0]);
								map[y][x] = "0";
								locat[y][x] = "-5";					
								shake(document.getElementById(strList[3]));
								$( "#msg" ).html("Your "+pawn+" wins the fight. Your turn now!");
								$( "#log" ).after("Your "+pawn+" wins the fight. Your turn now!<br><br>");
							}
						}
						$('div.enemy').draggable({disabled:false});
						gameTurn = 2;
						checkFlag("E");
					}
				}
			}
			
			function start(el) {
				gameStart = 1;
				gameTurn = 1;
				$.get("writeLzq.php", { content: ""});
				$( "#msg" ).html("Waiting opponent finishes set up...");
				$( "#log" ).after("Waiting opponent finishes set up...<br><br>");
				el.disabled = true;
				document.getElementById("load").disabled = true;
				//send data
				var list = "";
				$('div.enemy').each(function(){
					list += ""+($(this).attr('id'))+" "+($(this).parent().attr('id'))+" ";
				});
				$('div.enemy').draggable({disabled:true}); //disable drag (p2)
				
				$.get("writeP2.php", { content: list});
				//receive data
				var intervalId = setInterval(function(){
					$.ajax({
						url: "readP1.php",
						dataType: "text",
						cache: false,
						success: function(result){
							if(result != "Cannot read p1.txt"){
								pos = result.split(" ");
								var x,y;
								for(var i=0;i<pos.length-1;i+=2){ //[i+1] = cell id, [i] = pawn id
									document.getElementById(pos[i+1]).appendChild(document.getElementById(pos[i]));
									x = pos[i+1]%10;
									y = parseInt(pos[i+1]/10);
									map[y][x] = document.getElementById(pos[i]).classList[1];
									locat[y][x] = pos[i];
								}
								console.log(map);
								console.log(locat);
								$.get("writeP1.php", { content: ""});
								clearInterval(intervalId);
								$( "#msg" ).html("Game start!");
								$( "#log" ).after("Game start!<br><br>");
							}
						},
					})
				}, 2000);
			}
			
			function reset(){location.reload();}
			
			function drop(draggedUI,droppedID) {
				/* if(!turn){	//not this player's turn
					return false;
				} */
				var data = draggedUI.attr("id");			//dragged pawn id
				var cell = droppedID;						//cell (dropped into) id
				var pawn = document.getElementById(data);	//pawn as HTML DOM element
				var td = document.getElementById(cell);		//cell as HTML DOM element
				//find the location of the pawn that is moving
				var x = -1;
				var y = -1;
				for (var i = 0; i < 13; i++) {
					for(var k = 0; k < 5; k++){
						if(locat[i][k] == data){
							x = k;
							y = i;
						}
					}
				}
				var x2 = cell%10;
				var y2 = parseInt(cell/10);
				
				//now we have the previous location, pawn can only move to combination of (x+1 x x-1, y+1 y y-1)
				var absX = Math.abs(x - x2);
				var absY = Math.abs(y - y2);
				
				if (gameStart == 0){//player setting up	
					swapPawns(draggedUI,data,cell,pawn,td,x,y,x2,y2,absX,absY);
				}
				else{//after setup, during the game	
					var remainingChess = comparePawns(draggedUI,data,cell,pawn,td,x,y,x2,y2,absX,absY);
					if(remainingChess == false){
						return false;
					}
					//check if enemy flag is lost
					checkFlag("E");
					//enemy's turn;
					if(win == 0){
						//enemy();
					}
					//get the current movement
					c = "2 "+data+" "+y+x+" "+remainingChess+" "+y2+x2;
					$.get("writeLzq.php", { content: c});
					
					//disable draggable until next turn
					$('div.enemy').draggable({disabled:true});
					gameTurn = 1;
				}
			}
			
			function swapPawns(draggedUI,data,cell,pawn,td,x,y,x2,y2,absX,absY){
				//cancel: move into the same location
				if((absX == 0) && (absY == 0)){ draggedUI.draggable( 'option', 'revert', true ); return false;}
				
				//cancel: cant put in enemy's territory and campsite
				if(y2 >= 6 || (y2 == 2 && (x2 == 1 || x2 == 3)) || (y2 == 3 && x2 == 2) || (y2 == 4 && (x2 == 1 || x2 == 3))){
					$( "#msg" ).html("Set up your army in your territory but not in your campsite!");
					$( "#log" ).after("Set up your army in your territory but not in your campsite!<br><br>");
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: Must put flag in Headquarters
				if(pawn.classList[1] == "F"){
					if(y2 != 0 || (y2 == 0 && (x2 != 1 && x2 != 3))){
						$( "#msg" ).html("Must put flag in Headquarters.");
						$( "#log" ).after("Must put flag in Headquarters.<br><br>");
						
						draggedUI.draggable( 'option', 'revert', true );
						return false;
					}
				}
				//cancel: Can't put bomb in first row
				if(pawn.classList[1] == "B" && (y2 == 5)){
					$( "#msg" ).html("Can't put bomb in first row.");
					$( "#log" ).after("Can't put bomb in first row.<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: Must put mine in last 2 rows
				if(pawn.classList[1] == "M" && (y2 != 0 && y2 != 1)){
					$( "#msg" ).html("Must put mine in last 2 rows.");
					$( "#log" ).after("Must put mine in last 2 rows.<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//okay:	
				var prevLocat = document.getElementById((y*10+x));
				$(td).append(pawn);
				$(prevLocat).append(td.childNodes[0]);
				setTimeout(function(){ map[y][x] = prevLocat.childNodes[0].classList[1]; },3);
				setTimeout(function(){ locat[y][x] = prevLocat.childNodes[0].id; },4);
				setTimeout(function(){ map[y2][x2] = pawn.classList[1]; },5);
				setTimeout(function(){ locat[y2][x2] = pawn.id; },6);
				$( "#msg" ).html("Pawns swapped.");
				console.log(locat);
			}
			
			function comparePawns(draggedUI,data,cell,pawn,td,x,y,x2,y2,absX,absY){
				var remainingChess;
				//cancel: move into the same location
				if((absX == 0) && (absY == 0)){ draggedUI.draggable( 'option', 'revert', true ); return false;}
				
				//cancel: attack ally
				var res = locat[y2][x2].search(/E/i);
				if(res != -1) {//if res return correctly
					$( "#msg" ).html("Don't attack your ally!!!");
					$( "#log" ).after("Don't attack your ally!!!<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: cant move mine
				if(pawn.classList[1] == "M"){
					$( "#msg" ).html("Mine can't move!");
					$( "#log" ).after("Mine can't move!<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: cant go into mountain
				if((y2 == 6 && x2 == 1) || (y2 == 6 && x2 == 3)){
					$( "#msg" ).html("Don't run into the mountain!");
					$( "#log" ).after("Don't run into the mountain!<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: cant get out of headquarters
				if((y == 12 && x == 1) || (y == 12 && x == 3) || (y == 0 && x == 1) || (y == 0 && x == 3)){
					$( "#msg" ).html("Can't get out of headquarters!");
					$( "#log" ).after("Can't get out of headquarters!<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//cancel: cant fight with enemy in campsite
				if(land[y2][x2] == "CA" && map[y2][x2] != 0){
					$( "#msg" ).html("Can't fight with enemy in Campsite!");
					$( "#log" ).after("Can't fight with enemy in Campsite!<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				
				//from tr 11/12 to 12/11 and 0/1 to 1/0, pawn can only move up/down!
				if(((y == 12 && y2 == 11) || (y == 11 && y2 == 12) || (y == 0 && y2 == 1) || (y == 1 && y2 == 0)) && absX == 1){
					$( "#msg" ).html("Can't move like this here.");
					$( "#log" ).after("Can't move like this here.<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				
				//@ tr 12 or 0, pawn can only move left/right!
				if((y == 12 || y == 0) && (absY == 1 && absX == 1)) {
					$( "#msg" ).html("Can't move like this here.");
					$( "#log" ).after("Can't move like this here.<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				console.log(map[y2][x2]);
				console.log(pawn.classList[1]);
				//okay to move:
				if((absX == 1 || absX == 0) && (absY == 1 || absY == 0)){ //on normal road
					
				}
				else if(land[y][x] == "RA" && land[y2][x2] == "RA"){ //on railroad
					
					if((absX >0 && absY==0) || (absY >0 && absX==0)){ //if pawn stay on correct Railroad
						if(absY>0){//if moving up/down
							if(y > y2){//moving up
								if(land[y-1][x] != "RA" ){
									$( "#msg" ).html("Don't jump across railroad."); 
									$( "#log" ).after("Don't jump across railroad.<br><br>"); 
									
									draggedUI.draggable( 'option', 'revert', true );
									return false;
								}
								else{//loop to see until there is pawn blocking on the road
									for (var i = (y-1); i > y2; i--) {
										if(map[i][x] != 0){
											$( "#msg" ).html("Pawn is blocking railroad.");
											$( "#log" ).after("Pawn is blocking railroad.<br><br>");
											
											draggedUI.draggable( 'option', 'revert', true );
											return false;
										}
									}											
								}
							}
							else{//moving down
								if(land[y+1][x] != "RA" ){
									$( "#msg" ).html("Don't jump across railroad."); 
									$( "#log" ).after("Don't jump across railroad.<br><br>"); 
									
									draggedUI.draggable( 'option', 'revert', true );
									return false;
								}
								else{//loop to see until there is pawn blocking on the road
									for (var i = (y+1); i < y2; i++) {
										if(map[i][x] != 0){
											$( "#msg" ).html("Pawn is blocking railroad.");
											$( "#log" ).after("Pawn is blocking railroad.<br><br>");
											
											draggedUI.draggable( 'option', 'revert', true );
											return false;
										}
									}											
								}
							}
						}
						else{//moving left/right
							if(x > x2){
								if(land[y][x-1] != "RA" ){
									$( "#msg" ).html("Don't jump across railroad."); 
									$( "#log" ).after("Don't jump across railroad.<br><br>");
									draggedUI.draggable( 'option', 'revert', true );
									return false;
								}
								else{//loop to see until there is pawn blocking on the road
									for (var i = (x-1); i > x2; i--) {
										if(map[y][i] != 0){
											$( "#msg" ).html("Pawn is blocking railroad.");
											$( "#log" ).after("Pawn is blocking railroad.<br><br>");											
											draggedUI.draggable( 'option', 'revert', true );
											return false;
										}
									}											
								}
							}
							else{
								if(land[y][x+1] != "RA" ){
									$( "#msg" ).html("Don't jump across railroad.");
									$( "#log" ).after("Don't jump across railroad.<br><br>"); 
									
									draggedUI.draggable( 'option', 'revert', true );
									return false;
								}
								else{//loop to see until there is pawn blocking on the road
									for (var i = x+1; i < x2; i++) {
										if(map[y][i] != 0){
											$( "#msg" ).html("Pawn is blocking railroad.");
											$( "#log" ).after("Pawn is blocking railroad.<br><br>");
											
											draggedUI.draggable( 'option', 'revert', true );
											return false;
										}
									}		
								}
							}
						}
					}
					else{
						$( "#msg" ).html("Don't jump across railroad.");
						$( "#log" ).after("Don't jump across railroad.<br><br>");
						
						draggedUI.draggable( 'option', 'revert', true );
						return false; //wrong railroad, cancel
					}						
				}
				else{//cancel: moving not according to the rules
					$( "#msg" ).html("Please move your pawn according to the rules.");
					$( "#log" ).after("Please move your pawn according to the rules.<br><br>");
					
					draggedUI.draggable( 'option', 'revert', true );
					return false;
				}
				//do the comparison
				if(map[y2][x2] == "F"){//encounter flag
					if(pawn.classList[1] == "B"){//byebye bomb
						var prevLocat = document.getElementById((y*10+x));
						prevLocat.removeChild(prevLocat.childNodes[0]);
						map[y][x] = 0;
						locat[y][x] = "-5";
						shake(td.childNodes[0]);
						$( "#msg" ).html("Enemy pawn wins! Enemy's turn now!");
						$( "#log" ).after("Enemy pawn wins! Enemy's turn now!<br><br>");
						
					}
					else{//bye flag
						td.replaceChild(pawn,td.childNodes[0]);
						map[y2][x2] = pawn.classList[1];
						locat[y2][x2] = pawn.id;
						map[y][x] = 0;
						locat[y][x] = "-5";
						shake(td.childNodes[0]);
						$( "#msg" ).html("Your pawn wins! Enemy's turn now!");
						$( "#log" ).after("Your pawn wins! Enemy's turn now!<br><br>");
						
					}
				}
				else if(map[y2][x2] == "M"){//encounter mine
					if(pawn.classList[1] == "1"){//byebye mine
						td.replaceChild(pawn,td.childNodes[0]);
						map[y2][x2] = pawn.classList[1];
						locat[y2][x2] = pawn.id;
						map[y][x] = 0;
						locat[y][x] = "-5";
						shake(td.childNodes[0]);
						$( "#msg" ).html("Your pawn wins! Enemy's turn now!");
						$( "#log" ).after("Your pawn wins! Enemy's turn now!<br><br>");
						
						
					}
					else{//bye myself and mine
						var prevLocat = document.getElementById((y*10+x));
						prevLocat.removeChild(prevLocat.childNodes[0]);
						td.removeChild(td.childNodes[0]);
						map[y2][x2] = 0;
						locat[y2][x2] = "-5";
						map[y][x] = 0;
						locat[y][x] = "-5";
						explode(td);
						$( "#msg" ).html("Both pawns die together! Enemy's turn now!");
						$( "#log" ).after("Both pawns die together! Enemy's turn now!<br><br>");
						
					}
				}
				else if(map[y2][x2] == "B" || (pawn.classList[1] == "B" && map[y2][x2] != 0)){//encounter bomb or pawn is bomb
					var prevLocat = document.getElementById((y*10+x));
					prevLocat.removeChild(prevLocat.childNodes[0]);
					td.removeChild(td.childNodes[0]);
					map[y2][x2] = 0;
					locat[y2][x2] = "-5";
					map[y][x] = 0;
					locat[y][x] = "-5";
					explode(td);
					$( "#msg" ).html("Both pawns die together! Enemy's turn now!");
					$( "#log" ).after("Both pawns die together! Enemy's turn now!<br><br>");
					
				}
				else if((map[y2][x2] < pawn.classList[1]) && map[y2][x2] != 0){//encounter weak
					td.replaceChild(pawn,td.childNodes[0]);
					map[y2][x2] = pawn.classList[1];
					locat[y2][x2] = pawn.id;
					map[y][x] = 0;
					locat[y][x] = "-5";
					shake(td.childNodes[0]);
					$( "#msg" ).html("Your pawn wins! Enemy's turn now!");
					$( "#log" ).after("Your pawn wins! Enemy's turn now!<br><br>");
					
				}
				else if(map[y2][x2] > pawn.classList[1]){//encounter strong
					var prevLocat = document.getElementById((y*10+x));
					prevLocat.removeChild(prevLocat.childNodes[0]);
					map[y][x] = 0;
					locat[y][x] = "-5";
					shake(td.childNodes[0]);
					$( "#msg" ).html("Enemy pawn wins! Enemy's turn now!");
					$( "#log" ).after("Enemy pawn wins! Enemy's turn now!<br><br>");
					
				}
				else if(map[y2][x2] == pawn.classList[1]){//encounter same
					var prevLocat = document.getElementById((y*10+x));
					prevLocat.removeChild(prevLocat.childNodes[0]);
					td.removeChild(td.childNodes[0]);
					map[y2][x2] = 0;
					locat[y2][x2] = "-5";
					map[y][x] = 0;
					locat[y][x] = "-5";
					explode(td);
					$( "#msg" ).html("Both pawns die together! Enemy's turn now!");
					$( "#log" ).after("Both pawns die together! Enemy's turn now!<br><br>");
					
				}
				else if(map[y2][x2] == 0){//no encounter
					td.appendChild(pawn);
					map[y2][x2] = pawn.classList[1];
					locat[y2][x2] = pawn.id;
					map[y][x] = 0;
					locat[y][x] = "-5";
					$( "#msg" ).html("Enemy's turn now!");
					$( "#log" ).after("Enemy's turn now!<br><br>");
					
				}
				remainingChess = locat[y2][x2];
				return remainingChess;
			}
			
			function checkFlag(who){
				if (who == "P"){
					if(document.getElementById("EF-1") == null){
						losing();
					}
					if(document.getElementById("PF-1") == null){
						losing();
					}
				}
				else if (who == "E"){
					if(document.getElementById("PF-1") == null){
						winning();
					}
					if(document.getElementById("EF-1") == null){
						winning();
					}
				}
			}
			
			function losing(){
				$( "#msg" ).html("You lose... Reset the game to play again!");
				$( "#log" ).after("You lose... Reset the game to play again!<br><br>");
				alert("You lose!");
				$("div").attr("draggable", false);
			}
			
			function winning() {
				$( "#msg" ).html("You win!!! Reset to play again!");
				$( "#log" ).after("You win!!! Reset to play again!<br><br>");
				alert("You win!");
				$("div").attr("draggable", false);
				win = 1;
			}
			
			function shake(el){
				setTimeout(function(){el.style.transform = "rotate(10deg)";},50);
				setTimeout(function(){el.style.transform = "rotate(-10deg)";},100);
				setTimeout(function(){el.style.transform = "rotate(10deg)";},150);
				setTimeout(function(){el.style.transform = "rotate(0deg)";},200);
			}
			
			function explode(el){
				setTimeout(function(){$( el ).css( "background-image", "url('explode.png')" );},50);
				setTimeout(function(){$( el ).css( "background-image", "none" );},250);
			}
			
			function playerSetup(){
				var j = 0;
				var selector = $(".enemy");
				for (var i = 5; i >= 0; i--) {
					for(var k = 0; k < 5; k++){
						if((i == 2 || i == 4) && (k == 1 || k == 3)){
							continue;
						}
						if(i == 3 && k == 2){
							continue;
						}
						if(i == 0 && k == 3){ //put flag here
							document.getElementById("3").appendChild(selector.get("24"));
							map[0][3] = selector.get("24").classList[1];
							locat[0][3] = selector.get("24").id;
							continue;
						}
						//append to the table cell
						if(j < 25){
							document.getElementById((i*10+k)).appendChild(selector.get(j));
							map[i][k] = selector.get(j).classList[1];
							locat[i][k] = selector.get(j).id;
							j++;
						}
					}
				}
			}
			
		</script>
	</body>
</html>
