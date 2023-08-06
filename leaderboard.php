<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1">
    <title>Leaderboard</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./stylesPairs.css" />
    <style>
       /*This is the css for the background of the table*/
        .board {
        background-color: gray;
        border:2px;
        border-style:groove;
        margin-left: 25vw;
        margin-right:25vw;
        margin-top:90px;
        margin-bottom: 15px;
        position:relative;
        min-height: 50vh;
        max-width:50vw;
        padding:13px;
        box-shadow: 6px 6px 7px 5px red ;
        align-content:center;
        overflow: auto ;
            
    }
    /*This is the formatting for the table*/
    table {
        border:2px; /*boarder spacing at 2px set as per requirements*/
        min-height: 50vh;
        min-width:80%;
        background-color:white;
        margin-bottom: 0;
    }


    thead{
        background-color: rgb(25, 167, 206) ;
    }
    @media only screen and (max-width:756px){}

    </style>
    <script src ='./script.js'></script>
  </head>

<body>
    <div id='main'>
    <!--This imports the bavbar from its php file -->
    <?php 
        include './navbar.php'; ?>

    <br/><br/>
    <div class="board">
        <!-- The table is made in a stripped style as i thought that would be more aesthetically pleasing-->
        <table id="leadertable" style="margin-bottom:0;"class="table table-striped-column table-hover">
            <!--These are the table headers -->
            <thead>
                <tr style="text-align:center">
                    <th colspan="2">Pairs Leaderboard</th>
                </tr>
                <tr style="background-color:rgb(175, 211, 226)">
                    <th>Player Name</th>
                    <th id="noStyle">Score</th>
                </tr>
                
            </thead>
            <tbody id='tbody'>
            <!--The body of the table is initially given a placeholder value of No Players and No scores to show as there are no current users-->
            <tr id=placeholder> <td>No Players</td> <td>No Scores To Show</td></tr>
            </tbody>
        </table>
        <!-- This is the audio that plays when you open the page. I wanted fanfare music as I thought it would fit the congratulatory vibe
        of the page. Due to some browser issues (after some reading the browsers seem to be blocking the action), 
        it may only work after you click on the page rather than play automatically as intended -->
        <audio>
            <source src ='./assets/Royal_Fanfare.mp3' />
        </audio>

    </div>
   


    <script>
        //document.querySelector('body').addEventListener('mouseover',() => {document.querySelector('audio').play()});
        
        //this function sorts through the array of players and their scores (using a bubble sort) to give a descended array of scores that would then be displayed
        //the list comes from the JSON file
        function sortThroughArray(list){
            let i,j;
            for (i=0; i < list.length; i++){
                for (j = 0; j < list.length -i - 1; j++ ){
                    if (list[j].score < list[j + 1].score ){
                        var temp = list[j];
                        list[j] = list[j+1];
                        list[j+1] = temp;
            }
        }
     }

     return list; };
    
        //import confetti from 'https://cdn.skypack.dev/canvas-confetti';
        /*fetch('./leaderboard.json')
            .then((response) => response.json())
            .then((json) => json_contents = json);
        console.log('contents',json_contents); */

        //this feeds in the data to populate table and calls the dunction
        function triggerPopulateTable(){
            sortedList.forEach(element => {
                populateTable(element.user,element.score)
            });

        }

        //this function looks for any duplicated usernames in the json file, only allowing the higher of usernames to appear on the leaderboard
        function lookForDuplicates(){
            
            sortedList.forEach(element =>{
                var i =0;
                while (i < sortedList.length){
                    if (element.user == sortedList[i].user && sortedList[i].score < element.score){
                        sortedList.splice(i,1);
                    } else { ++i;}
                }
                
            })
        }

        //This populates the leaderboard table. appending new rows and cells to the table
             function populateTable(username,mark){
                //this hides the placeholder text as there is now something to put in the table
                document.getElementById('placeholder').style.display= 'none'; 
                
                let table = document.getElementById('tbody');
                let row = table.insertRow(-1); 
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
            
                // Add data to cell1 (this is the player's name) and cell2 (their score)
                cell1.innerText = username;
                cell2.innerText = mark;


            
            };
    </script>
    <?php
        session_start();

        if (isset($_COOKIE['currentUser'])){
            /* Hides leaderbaord from the navigation bar  */
            echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>"; 
            } 
        else{
                //If the user is not in a registered session. It forces the browser to load the index page
                echo "<script>window.location.replace('./index.php');</script>";
                } 

 



        //read in the json file
        
        $json_file = file_get_contents('./leaderboard.json');

        //decode the json file
        $data_from_json = json_decode($json_file,true);

        $bool = false;

        $add_data = array('user' => $_COOKIE['currentUser'],'score' => intval($_COOKIE['userScore']) );
        //This goes through all the data in the json file. if the current user and current score is already in the JSON file. it sets the boolean to true
        foreach($data_from_json as $item){
            if ($item['user'] == $_COOKIE['currentUser'] and $item['score'] == $_COOKIE['userScore']){
                $bool = true;
            }

        }

        //if the current score and current user is not in the json file. it adds the data
         if ($bool === false){
        array_push($data_from_json,$add_data);
        $jsonData = json_encode($data_from_json); //the json data is encoded

        //sessions are created with the user and user's score
        $_SESSION['sameUser'] = $_COOKIE['currentUser']; 
        $_SESSION['sameScore'] = $_COOKIE['userScore'];

//the new array is saved in the json file.
        if(file_put_contents(__DIR__ . '/leaderboard.json',$jsonData)){
            echo "<script>console.log('success');</script>";

        } else { echo "<script>console.log('fail');</script>";}}

        
     
    

        //read in the json file (with the updated information)
        $json_file_updated = file_get_contents('./leaderboard.json');

        //decode the json file
        $data_json = json_decode($json_file_updated,true);
        $data_json = json_encode($data_json);


  
        // This bit of php code. created teh sorted list variable and triggers the table population, when the page is loaded.
        echo "<script>console.log('stuff $data_json');var sortedList = sortThroughArray($data_json);lookForDuplicates();triggerPopulateTable()</script>";
        //print_r($data_json);
        //echo "<script>console.log('$data_json');</script>";





        ?>
        <!--This is the script to that puts confetti on the screen when the page is loaded-->
        <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
        <script>
            
            //console.log(sortedList);
            //const canvas = document.querySelector('canvas');
            const jsConfetti = new JSConfetti(); //creates a constant called jsConfetti

            var count=0;
            //when the mouse moves over the screen the confetti is triggered, a maximum of 3 times unless the page is reloaded
            document.addEventListener('mouseover',() => {if(count<4){document.querySelector('audio').play();jsConfetti.addConfetti({confettiNumber:400,});count++;}});
            
            //the audio kicks in when the page is clicked. I used add event listener for this and the code above to help it be more concise
            document.addEventListener('click',() => {document.querySelector('audio').play()});

        </script>







            



    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </div>
</body>



</html>
