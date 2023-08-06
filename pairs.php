<!DOCTYPE html > 
<head>
    
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1"/>
    <title>Pairs</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="./stylesPairs.css"/>
    <style>
      /* The styl for the game board (the base the cards sit on) */
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
            box-shadow: 6px 6px 7px 5px red ; /* The box shadow has a spread of 5px, so it is 5px box shadow*/ 
            align-content:center;
            
    }

    /*THIS IS THE CONTAINER THAT HOLDS THE CARDS */
.grid-container {
    margin-top:5%;
  display: grid;
  grid-template-columns:  auto auto auto auto auto ;
  grid-template-rows: 50% 50%;
  gap: 10px;
  background-color: gray;
  padding: 10px;
  justify-content:space-evenly;
}

.grid-container > div, .card-body, .card-body-back {
  background-color: orange;
  text-align: center;
  padding: 20px ;
  font-size: 30px;
  /*This is the svg for the card design */
  background-image: url("data:image/svg+xml,<svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'><defs><pattern id='a' patternUnits='userSpaceOnUse' width='46.5' height='46.5' patternTransform='scale(2) rotate(105)'><rect x='0' y='0' width='100%' height='100%' fill='hsla(184,47.4%,45.5%,1)'/><path d='M27.31-2.917a5 5 0 010 5.834m-8.12 0a5 5 0 010-5.834m-4.827 7.501a10 10 0 010-9.169m17.774.001a10 10 0 010 9.169M10.181 7.36a15 15 0 01-.001-14.722m26.14 0a15 15 0 010 14.724m-9.01 36.22a5 5 0 010 5.835m-8.12 0a5 5 0 010-5.834m-4.827 7.501a10 10 0 010-9.169m17.774.001a10 10 0 010 9.169M10.181 53.86a15 15 0 01-.001-14.723m26.14 0a15 15 0 010 14.724m6.12-27.693a5 5 0 010-5.834m-4.827 7.5a10 10 0 010-9.169M33.431 30.61a15 15 0 01-.001-14.722M4.06 20.332a5 5 0 010 5.835m4.827-7.501a10 10 0 010 9.169m4.183-11.947a15 15 0 010 14.724'  stroke-linecap='square' stroke-width='3' stroke='hsla(43,89.2%,67.3%,1)' fill='none'/><path d='M43.582 42.44a5 5 0 015.835 0m-7.501-4.827a10 10 0 019.169 0M39.138 33.43a15 15 0 0114.724 0m-56.781 9.01a5 5 0 015.836 0m-7.501-4.827a10 10 0 019.169 0M-7.362 33.43a15 15 0 0114.724 0M49.417 4.06a5 5 0 01-5.834 0m7.501 4.827a10 10 0 01-9.169 0m11.946 4.182a15 15 0 01-14.723.001M2.917 4.06a5 5 0 01-5.834 0m7.501 4.827a10 10 0 01-9.169 0M7.36 13.069a15 15 0 01-14.722.001m27.694 6.12a5 5 0 015.835 0m0 8.12a5 5 0 01-5.834 0m7.5 4.827a10 10 0 01-9.168 0m.001-17.774a10 10 0 019.169 0m2.776 21.956a15 15 0 01-14.723.001m0-26.14a15 15 0 0114.724 0'  stroke-linecap='square' stroke-width='3' stroke='hsla(165,2.6%,29.8%,1)' fill='none'/></pattern></defs><rect width='800%' height='800%' transform='translate(0,0)' fill='url(%23a)'/></svg>");
  background-position: center center;
  background-size: cover; 
  transition: transform 1s;
  transform-origin: center right;
  transform-style: preserve-3d;
  cursor: pointer;
}
/**Animation for the flipping action */
.card-body.is-flipped{
  transform:translateX(-100%) rotateY(-180deg);
}
/*I eventually toggle between this and back */
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
button#startGameButton, h1 {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}


    </style>
      <script src ='./script.js'></script>
  </head>

<body>
  <div id='main'>


    <!--All the elements are housed in containers-->
    <div class='row'>
            <div class='col'>
              <!-- This adds the nav bar -->
            <?php include './navbar.php'; 
                    session_start();
                    if (isset($_COOKIE['currentUser'])){
                        echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>";
                    } else{
                      //This bit of code sends the user to the index/home page if there are not using a registered session
                    
                        echo "<script>window.location.replace('./index.php');</script>"; }
            ?>

            </div>
    </div>
    <div class="container text-center">
        <div class="row">
         
            <div class="col-sm-4">
               <!-- This is where the scores, time and click count is kept. I shifts position when the displayed on a smaller screen  --> 
                <div id= counters class="counters" style="display:none;color:white;text-align:center;">
                    <h2 id="score">Score:  </h2> 
                    <h2 id="time">Time:   </h2>
                    <h2 id="clickCount">Number of Clicks:  </h2>
                </div>

            </div>
            <div class="col-sm-8">
            <br/>
    <button id="startGameButton" onclick="showcontent()" type="button" class="btn btn-success">Start Game</button>  <!-- This is the start game button -->
    <h1 style="top:60%;color:white">Play the game by matching the cards</h1>
    <br/>
     <!-- This is the game baord and all cards are then within it. from the back front (the empty
     part) they all look identical. The card body class houses the card-front and the card-back which has the work back written as a 
     placeholder.
    -->
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
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
            <div class="card-body">
              <div class="card-front"></div>
              <div style="background-color:white;" class="card-back">Back</div>
            </div>
        </div>
         <!-- Instructions to replay the game 
        <h3>To replay/restart refresh your tab - Click Ctrl + R. To submit your score click submit button<span><form onclick='gameOverButton()' action='./leaderboard.php' method='POST'> <button  class='btn btn-success' name ='scorebutton' type='submit' value='score'> Submit</button></span> </h3>
        -->
        <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button id='gameOverToggle' style="visibility:hidden;position:absolute;top:100%;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="staticBackdropLabel">Would you like to save or replay?</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button onclick="location.reload()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Replay</button> <!-- This will reload the page hence restarting the game-->
        <form onclick='gameOverButton()' action='./leaderboard.php' method='POST'><button name='score' type="submit" class="btn btn-primary">Save score</button></form> <!-- This will send the user to the leaderboard page-->
      </div>
    </div>
  </div>
</div>

    </div>
            </div>
        </div>
    </div>

    </div>
    <audio>
            <source src ='./assets/Gameplay- Gerudo Valley - The Legend of Zelda A Ocarina Of Time.mp3'/>
    </audio>
    <audio>
            <source src ='./assets/Clink sound effect.mp3'/>
    </audio>

 
    <script>
    //list of all variables
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

    //this function identifies what card(s) have been selected and if the two cards match
    function findCard(looking){
      if (firstclick == 0){
        firstclick=looking;
        item = firstclick.getElementsByTagName('img')[0];
        firstclickImage= item.getAttribute('src'); //this finds the image on the card
      } else {
        secondClick=looking;
        item = secondClick.getElementsByTagName('img')[0];
        secondClickImage= item.getAttribute('src'); //this gets the image on the card
        //console.log(firstclickImage,secondClickImage);
        match = IsAMatch(firstclickImage,secondClickImage); //calls the isAMatch function to find if the two images on the card are the same
        switch (match){
        case true:
          
          console.log("it's a match");
          updateScore();
          firstclick.style.pointerEvents = 'none'; // switch off the ability to click on the card and flip it
          firstclick.style.bordercolor = 'green';
          secondClick.style.bordercolor = 'green';
          secondClick.style.pointerEvents = 'none'; // switch off the ability to click on the card and flip it
          card_matches += 1;
          if (card_matches == (card_array.length/2)){
            console.log("done");
            gameOver(); // ends the gameplay after the last match

          }


          break;
        case false:
          //the cards are flipped back here since they would'nt have matched
          (function flipcard(){
            firstclick.classList.remove('is-flipped');
            secondClick.classList.remove('is-flipped');
          })();
         break;
        }
        firstclick = 0;secondClick = 0;
      }

      
    }
    //this is an array of all the cards in the html body
    var cards = document.querySelectorAll('.card-body');
    /*this is an event listener for all the cards in the gamw . WHen it is clicked, 'is flipped' is added to the class and the  turning animation happens.
 the click is taken account. the find card functin from above is called
    */
    [...cards].forEach((card)=>{ card.addEventListener('click', async function() {card.classList.add('is-flipped');registerClicks();await delay(1200);findCard(this); });});

    // This host of scripts is to generate the emojis on the back of the card
    const icons = [];

    // These three arrays contains links to the images that would be layered to form the emojis
    const eyes =['./emoji assets/eyes/closed.png','./emoji assets/eyes/laughing.png','./emoji assets/eyes/long.png','./emoji assets/eyes/normal.png','./emoji assets/eyes/rolling.png','./emoji assets/eyes/winking.png'];
    const mouth =['./emoji assets/mouth/surprise.png','./emoji assets/mouth/teeth.png','./emoji assets/mouth/smiling.png','./emoji assets/mouth/straight.png','./emoji assets/mouth/sad.png','./emoji assets/mouth/open.png'];
    const skin = ['./emoji assets/skin/green.png','./emoji assets/skin/red.png','./emoji assets/skin/yellow.png'];
    
    //Over 15 different random emojis are created
    for (let i =0;i<15;i++){
      //three different random numbers are generated to help create the emojies at randim
    let rand1 = Math.floor(Math.random() * 6);
    let rand2 = Math.floor(Math.random() * 6);
    let rand3 = Math.floor(Math.random() * 3);

//this function loads all the emojies and stores then in an array
    loadImages([skin[rand3],mouth[rand2],eyes[rand1]]).then((images) => {
  // call the layerImages function with the loaded images
  return layerImages(images[0], images[1], images[2]); 
}).then((layeredDataURL) => {
  console.log('lala',layeredDataURL);
  // if the the icon/emoji that is created is NOT in the array then it is added (pushed into it)
  if (icons.includes(layeredDataURL) == false){
  icons.push(layeredDataURL);}
  console.log(icons);
  generatePictures(character_array);
  if (character_array.length == 10){
  (function populateCards(){ //this function actually adds the images from character_array to the back of the cards
      index=0
      for (let x of card_array){
        x.innerHTML= "<img src= '" + character_array[index] + "'/>";
        index++;
      }
    })();}
  
}).catch((error) => {
  
  
}); }
    
//this is the start of the game timer
    function StartTimer(){
        startTime = Date.now();
        //console.log(startTime);
        setTimeout(timeSpent,step);
      

    }
    var step = 1000
    //this function is used to create cookies, as a sort of template in a way
    function setCookie(cname, cvalue, expirydays) {
      const date = new Date();
      date.setTime(date.getTime() + (expirydays*24*60*60*1000));
      let expires = "expires="+ date.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
  
//this function keeps count of the time since the game started. It changes the time variable and that time variable is what is shown in time on the game screen and used to calculate scores
    function timeSpent(){
      var timeNow = Date.now();
      time = Math.floor((timeNow - startTime)/1000);
      document.getElementById("time").innerHTML = "Time: " + time;
      if (card_matches < (card_array.length/2)){
      setTimeout(timeSpent,step);}
    };

    //this changes the score shown on the game screen
    function updateScore(){
      var Score = Math.floor((clicks / time) * 10) + 1;
      score += Score;
      document.getElementById("score").innerHTML = "Score: " + score ; //this will update the score text in the displayed score
    }
//this function ends the game. 
    function gameOver(){
      document.getElementById("score").innerHTML += "<br/><strong style='color:red'>GAME OVER</strong>" ; //adds game over to the score field
      //document.querySelector("h3").style.visibility= 'visible'; //makes the replay visible now
      console.log(document.getElementById('gameOverToggle'));
      document.getElementsByClassName('modal-body')[0].innerHTML= "Your game is now over. Would you like to save your score of " + score + " or replay the game." 
      document.getElementById('gameOverToggle').click();
    }

// ends the game and creates a cookie of the score
    function gameOverButton(){
      
      setCookie('userScore',score,5);
      document.getElementsByName('scorebutton')[0].setAttribute('value',score);
    }

    
//keeps count of th enumbve rof clicks on the cards a user makes 
    function registerClicks(){
      clicks += 1;
      document.getElementById("clickCount").innerHTML = "Number of Clicks: " + clicks;
    }

    //Need to check that cards match
    function IsAMatch(first,second){
      if (first == second){
        document.querySelectorAll('audio')[1].play();
        return true; //if the two cards are the same it returns true
    } else{
      return false;
      /*firstclick.classList.remove('is-flipped');
      secondClick.classList.remove('is-flipped'); */
    }
    }

    //this function is called after the button to start is clicked. It hides the button and reveals the game board
    function showcontent(){
      document.getElementById("counters").style.display= 'initial';
      document.querySelector(".game-board").style.visibility= 'visible';
      document.querySelector("button").style.display= 'none';
      document.querySelector("h1").style.display= 'none';
      document.querySelectorAll('audio')[0].play(); //starts the audio
      //document.querySelector("h3").style.visibility= 'hidden';
      StartTimer();


    }
    
    
    
    let character_array=[]; 
    //perfroms a randomly shuffles the array so the pair of cards aren't right beside each other 
    function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        var temporary = array[i];
        array[i] = array[j];
        array[j] = temporary;

    }
    
}  
// this function adds icons from the icon array to the the character array (this array is the array of two pairs of emojies that will eventually end up on the back of the cards)
    function generatePictures(character_array){
        shuffleArray(icons);
      
      
        icons.forEach(element => {
            if ((typeof element !== undefined) && (character_array.includes(element) == false) && (character_array.length < 10) ) {
            character_array.push(element);
            character_array.push(element);}
        });
        shuffleArray(character_array); //the pairs of cards are shuffled around
            
      
 
      //console.log(character_array);
    }
    
 
    //console.log(character_array)

    var card_List = document.querySelectorAll('.card-back');
    var card_array = [...card_List]; //this is an array of the cards with the card-back class
    //console.log(card_array);
    


// this function is used to make sure all the images load if not an error is returned. It uses a map so we can use a function on the whole array without changing the actual array
    function loadImages(imageURLs) {
  return Promise.all(imageURLs.map((url) => {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => {
        resolve(img);
      };
      img.onerror = (error) => {
        reject(error);
      };
      img.src = url;
    });
  }));
}

//this function is similar to the avatar making function. I've repurposed the code to make one to create the emojies for the cards
function layerImages(skin, eyes, mouth) {
  return new Promise((resolve, reject) => {
    // create a canvas element
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");

    // set the canvas dimensions
    canvas.width = 500;
    canvas.height = 500;

    // draw the images on the canvas in the desired order
    ctx.drawImage(skin, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(eyes, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(mouth, 0, 0, canvas.width, canvas.height);

    // convert the canvas to a data URL and resolve the promise
    const layeredDataURL = canvas.toDataURL();
    resolve(layeredDataURL);
  });
}









    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</div>
  </body>

</html>