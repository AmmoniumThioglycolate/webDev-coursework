<head>
	<!--This php script is then included in each script to insert the navbar. It is used in an effort to avoid repetition-->
<style>
	/*THIS IS THE SCRIPT THAT STYLES TEH NAVBAR*/ 
		img{
			width:2rem;
			height:2rem;
		}
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

		ul.menu li{float: left;
			font-size: 12px;}
		ul.menu li a{
			display : block;
			font-weight:bold;
			color: white;
			height:0.9cm;
			width: 5cm;
			padding-top: 10px;
			text-align: center;
			text-decoration:none;
            font-family: "Verdana";

		}
		#floaters{
			float:right;
		}
		ul.menu li a:hover{background-color:rgb(13,140,255);}
		
		/* When the screen size reduces below 756px i wanted the items in the navigation bar to change position*/
		@media only screen and (max-width:756px){
			#floaters{
			float:left;
			
		}
		ul.menu li{float: left;
		margin-left:25vw;}
		ul.menu li a{
			font-size:8px;
			display : inline;
		}


	}






		</style>
		<?php 
		//This calls addprofile function found in the js script file. This adds the profile picture to the navbar that is stored in the computer's local storage
			if(isset($_COOKIE['currentUser'])){
				echo "<script>document.querySelector('body').setAttribute('onload','addProfile()')</script>";
			}
		?>
	</head>
	<body>
 		<!--This the list of page links-->
		<ul id='menuNav' class="menu">
			<li id ='homeLink' name='home' ><a href="./index.php">Home</a></li>
			<li id ='floaters' name='memory'><a href="./pairs.php">Play Pairs</a></li>
			<li id ='floaters' name ='leaderboard' style="display:none;"><a href="./leaderboard.php">Leaderboard</a></li>
			<li id ='floaters' name='register'><a href="./registration.php">Register</a></li>						
		</ul>
		

    </body>
