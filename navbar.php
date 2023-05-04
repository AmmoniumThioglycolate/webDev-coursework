<head>
<style>
		
		ul.menu{
			list-style-type: none;
			margin: 0;
			padding : 0;
            top:0;
            position:fixed;
            width:100%;
            z-index:10;
            opacity:80%;
			background-color: rgb(0,83,161);
			overflow:hidden;}

		ul.menu li{float: left;}
		ul.menu li a{
			display : block;
			color: white;
			height:0.9cm;
			width: 5cm;
			padding-top: 10px;
			text-align: center;
            font-size: 12px;
			text-decoration:none;
            font-family: "Verdana";

		}
		#floaters{
			float:right;
		}
		ul.menu li a:hover{background-color:rgb(13,140,255);}
		@media only screen and (max-width:756px){
			#floaters{
			float:left;
			
		}
		ul.menu li{float: left;
		margin-left:25vw;}

	}






		</style>
	</head>
	<body>

		<ul id='menuNav' class="menu">
			<li><a href="./index.php">Home</a></li>
			<li id ='floaters'><a href="./bootspairs.php">Play Pairs</a></li>
			<li id ='floaters' name ='leaderboard' style="display:none;"><a href="./leaderboard.php">Leaderboard</a></li>
			<li id ='floaters'><a href="./registration.php">Register</a></li>						
		</ul>
		

    </body>
