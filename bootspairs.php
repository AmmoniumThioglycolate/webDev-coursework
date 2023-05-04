<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1"/>
    <title>Pairs</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="stylesPairs.css"/>
    <style>
        .game-board {
            visibility: hidden;
            background-color: gray;
            border:3px;
            border-style:groove;
            margin-left: 30px;
            margin-right:30px;
            margin-top:45px;
            margin-bottom:20px;
            position:relative;
            height:80vh;
            width: 60vw;
            padding:13px;
            box-shadow: 6px 6px 7px 5px red ;
            align-content:center;
            overflow
    }
.grid-container {
    margin-top:5%;
  display: grid;
  grid-template-columns:  180px 180px 180px 180px ;
  grid-template-rows: 50% 50%;
  gap: 10px;
  background-color: blue;
  padding: 10px;
  justify-content:space-evenly;
}

.grid-container > div, .card-body, .card-body-back {
  background-color: orange;
  text-align: center;
  padding: 20px ;
  font-size: 30px;
  background-image: url("data:image/svg+xml,<svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'><defs><pattern id='a' patternUnits='userSpaceOnUse' width='46.5' height='46.5' patternTransform='scale(2) rotate(105)'><rect x='0' y='0' width='100%' height='100%' fill='hsla(184,47.4%,45.5%,1)'/><path d='M27.31-2.917a5 5 0 010 5.834m-8.12 0a5 5 0 010-5.834m-4.827 7.501a10 10 0 010-9.169m17.774.001a10 10 0 010 9.169M10.181 7.36a15 15 0 01-.001-14.722m26.14 0a15 15 0 010 14.724m-9.01 36.22a5 5 0 010 5.835m-8.12 0a5 5 0 010-5.834m-4.827 7.501a10 10 0 010-9.169m17.774.001a10 10 0 010 9.169M10.181 53.86a15 15 0 01-.001-14.723m26.14 0a15 15 0 010 14.724m6.12-27.693a5 5 0 010-5.834m-4.827 7.5a10 10 0 010-9.169M33.431 30.61a15 15 0 01-.001-14.722M4.06 20.332a5 5 0 010 5.835m4.827-7.501a10 10 0 010 9.169m4.183-11.947a15 15 0 010 14.724'  stroke-linecap='square' stroke-width='3' stroke='hsla(43,89.2%,67.3%,1)' fill='none'/><path d='M43.582 42.44a5 5 0 015.835 0m-7.501-4.827a10 10 0 019.169 0M39.138 33.43a15 15 0 0114.724 0m-56.781 9.01a5 5 0 015.836 0m-7.501-4.827a10 10 0 019.169 0M-7.362 33.43a15 15 0 0114.724 0M49.417 4.06a5 5 0 01-5.834 0m7.501 4.827a10 10 0 01-9.169 0m11.946 4.182a15 15 0 01-14.723.001M2.917 4.06a5 5 0 01-5.834 0m7.501 4.827a10 10 0 01-9.169 0M7.36 13.069a15 15 0 01-14.722.001m27.694 6.12a5 5 0 015.835 0m0 8.12a5 5 0 01-5.834 0m7.5 4.827a10 10 0 01-9.168 0m.001-17.774a10 10 0 019.169 0m2.776 21.956a15 15 0 01-14.723.001m0-26.14a15 15 0 0114.724 0'  stroke-linecap='square' stroke-width='3' stroke='hsla(165,2.6%,29.8%,1)' fill='none'/></pattern></defs><rect width='800%' height='800%' transform='translate(0,0)' fill='url(%23a)'/></svg>");
  background-position: center center;
  background-size: cover; 
  transition: transform 1s;
  transform-origin: center right;
  transform-style: preserve-3d;
  cursor: pointer;
}

.card-body.is-flipped{
  transform:translateX(-100%) rotateY(-180deg);
}
.card-body.is-flipped .card-front{
  display: none;
}
.card-back > img{
  height:60%;
  width:60%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding-top:65px;
  padding-bottom:65px;
}

.card-back {
  text-align:center;
  transform: rotateY(180deg);
  backface-visibility: hidden; 
  }
.counters h2{
  text-align: center;
  display: inline-block;
  font-size: 20px;
  padding-top: 45px;
  padding-right: 70px;
  margin:45px;

}
button {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}


    </style>
  </head>

<body>


    <!--In the body we add our content -->
    <div class='row'>
            <div class='col'>
            <?php include './navbar.php'; 
                    session_start();
                    if (isset($_COOKIE['currentUser'])){
                        echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>";
                    } else{
                        echo "<script>window.location.replace('./index.php');</script>";
                        }
            ?>

            </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4">
                <div id= counters class="counters" style="display:none;color:white;text-align:center;">
                    <h2 id="score">Score:  </h2> 
                    <h2 id="time">Time:   </h2>
                    <h2 id="clickCount">Number of Clicks:  </h2>
                </div>

            </div>
            <div class="col-sm-8">
            <br/>
    <button onclick="showcontent()" type="button" class="btn btn-outline-success">Start Game</button>
    <br/>
    <div class="game-board">
        <div class="grid-container">
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
        </div>
        

    </div>
            </div>
        </div>
    </div>

    </div>

 
    <script>
    var score = 0;
    var time = 0;
    var startTime= 0 ;
    var firstclick= 0;
    var item = 0;
    var secondClick=0;
    var firstclickImage ="";
    var secondClickImage="";
    var card_matches = 0;
    var clicks = 0;
    var match = false;
    function delay(time) {return new Promise(resolve => setTimeout(resolve, time))}

    function findCard(looking){
      if (firstclick == 0){
        firstclick=looking;
        item = firstclick.getElementsByTagName('img')[0];
        firstclickImage= item.getAttribute('src');
      } else {
        secondClick=looking;
        item = secondClick.getElementsByTagName('img')[0];
        secondClickImage= item.getAttribute('src');
        console.log(firstclickImage,secondClickImage);
        match = IsAMatch(firstclickImage,secondClickImage);
        switch (match){
        case true:
          console.log("it's a match");
          updateScore();
          firstclick.style.pointerEvents = 'none';
          firstclick.style.bordercolor = 'green';
          secondClick.style.bordercolor = 'green';
          secondClick.style.pointerEvents = 'none';
          card_matches += 1;
          if (card_matches == (card_array.length/2)){
            console.log("done");
            setCookie('userScore',score,5);
          }


          break;
        case false:
          (function flipcard(){
            firstclick.classList.remove('is-flipped');
            secondClick.classList.remove('is-flipped');
          })();
         break;
        }
        firstclick = 0;secondClick = 0;
      }

      
    }
    var cards = document.querySelectorAll('.card-body');
    [...cards].forEach((card)=>{ card.addEventListener('click', async function() {card.classList.add('is-flipped');registerClicks();await delay(1200);findCard(this); });});
    const icons = ["./assets/bear.png","./assets/lion.png",'./assets/zebra.png','./assets/tiger.png','./assets/horse.png','./assets/squirrel.png','./assets/sheep.png','./assets/hippo.png'];
    
    function StartTimer(){
        startTime = Date.now();
        console.log(startTime);
        setTimeout(timeSpent,step);
      

    }
    var step = 1000
    function setCookie(cname, cvalue, expirydays) {
      const date = new Date();
      date.setTime(date.getTime() + (expirydays*24*60*60*1000));
      let expires = "expires="+ date.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
    
    function timeSpent(){
      var timeNow = Date.now();
      time = Math.floor((timeNow - startTime)/1000);
      document.getElementById("time").innerHTML = "Time: " + time;
      if (card_matches < (card_array.length/2)){
      setTimeout(timeSpent,step);}
    };
    function updateScore(){
      var Score = Math.floor((clicks / time) * 10) + 1;
      score += Score;
      document.getElementById("score").innerHTML = "Score: " + score ;
    }

    

    function registerClicks(){
      clicks += 1;
      document.getElementById("clickCount").innerHTML = "Number of Clicks: " + clicks;
    }
    //Need to check that cards match
    function IsAMatch(first,second){
      if (first == second){
        return true;
    } else{
      return false;
      /*firstclick.classList.remove('is-flipped');
      secondClick.classList.remove('is-flipped'); */
    }
  

    }
    function showcontent(){
      document.getElementById("counters").style.display= 'initial';
      document.querySelector(".game-board").style.visibility= 'visible';
      document.querySelector("button").style.display= 'none';
      StartTimer();

    }
    
    
    
    let character_array=[];  
    function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        var temporary = array[i];
        array[i] = array[j];
        array[j] = temporary;

    }
    return array;
}  
    function generatePictures(character_array){
      shuffleArray(icons);
      for (let x = 0; x< 4;x++){
        character_array.push(icons[x]);
        character_array.push(icons[x]);
      }
      console.log(character_array);
    }
    generatePictures(character_array);
    character_array=shuffleArray(character_array);
    console.log(character_array)

    var card_List = document.querySelectorAll('.card-back');
    var card_array = [...card_List];
    console.log(card_array);
    (function populateCards(){
      index=0
      for (let x of card_array){
        x.innerHTML= "<img src= '" + character_array[index] + "'/>";
        index++;
      }
    })();




    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>