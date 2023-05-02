<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.navbar {
  grid-area: navbar;
  margin-bottom: 30px;

}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas: 
    'navbar navbar navbar navbar navbar navbar' 
    'scoreboard game game game game timeSection' ;
  /* grid-column-gap: 10px; - if you want gap between the columns */
} 

.scoreboard,
.game,
.timeSection {
  padding: 10px;
  height: 600px; /* Should be removed. Only for demonstration */
}

/* Style the left column */
.scoreboard {
  grid-area: scoreboard;
}

/* Style the middle column */
.game {
  grid-area: game;
}

/* Style the right column */
.timeSection {
  grid-area: timeSection;
}



/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .grid-container  {
    grid-template-areas: 
      'navbar navbar navbar navbar navbar navbar' 
      'timeSection timeSection timeSection timeSection timeSection timeSection' 
      'game game game game game game' 
      'scoreboard scoreboard scoreboard scoreboard scoreboard scoreboard' 
      ;
  }
  .scoreboard,.timeSection {
  height:70px;
}
}
</style>
</head>
<body>
<div class="grid-container">
  <div class="navbar">
   <?php include './navbar.php'; ?>
  </div>
  
    <div class="scoreboard" style="background-color:#aaa;">
        <h2 id="score">Score: </h2>
    </div>
  <div class="game" style="background-color:#bbb;">Column</div>  
  <div class="timeSection" style="background-color:#ccc;">
    <div id= counters class="counters" style="display:;color:white;text-align:left;">
      <h2 id="time">Time:   </h2>
      <h2 id="clickCount">Number of Clicks:  </h2>
    </div>
  </div>
  
</div>

</body>
</html>


