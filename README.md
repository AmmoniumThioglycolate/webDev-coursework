link : http://ml-lab-4d78f073-aa49-4f0e-bce2-31e5254052c7.ukwest.cloudapp.azure.com:50871/pairs_game/index.php
#Home Page
-  'welcome to pairs' has a css animation , it doubles when you hover over it.
- A bootstrap button and link are used.

#Register Page [Complex attempt]
- Selection system  implemented for avatar. when you select a feature the background-colour goes red and the border orange. 
- The avatar is saved unto to the localstorage and it proved to big/cumbersome for cookies
- the form is actioned to the same page and adds a 'you have been registered to the end of the page' when successful.
- If the nickame is invalid, the textbox turns red and a guide is shown beneath.
- nickname is stored on a cookie and session variable

#Pairs game [medium attempt]
- Two containers are used one for score/time and the other the game board.
- Score is based on the number of click and the time taken +1. Game stops when all cards are turned.
- The card backs and parts of the front as covered in an svg pattern to give it a nicer look. 
- The cards have a flipping animation when clicked.
- Also the score is automatically added to a cookie, even without submitting the game, as I assume many will forget.
- If submit is not clicked, the most recent score is saved.

#leaderboard Page
- A leaderboard showing the top scores (the scores are stored in a json file hosted on the server).
- Moving the mouse on the page triggers confetti (a function imported from the web)
- Mouse click triggers (triumphant music).
