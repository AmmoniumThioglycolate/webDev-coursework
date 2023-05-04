<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesPairs.css" />
    <style>
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
    table {
        border:2px;
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
  </head>

<body>
    <!--In the body we add our content -->
    <?php 
        include './navbar.php'; ?>



    <br/><br/>
    <div class="board">
        <table id="leadertable" style="margin-bottom:0;"class="table table-striped-column table-hover">
            <thead>
                <tr style="text-align:center">
                    <th colspan="2">Pairs Leaderboard</th>
                </tr>
                <tr style="background-color:rgb(175, 211, 226)">
                    <th>Player Name</th>
                    <th id="noStyle">Score</th>
                </tr>
            </thead>
            <tbody id='tbody'></tbody>
        </table>

    </div>


    <script >
        //import confetti from 'https://cdn.skypack.dev/canvas-confetti';
        
             function populateTable(username,mark){
                console.log('hello');
                let table = document.getElementById('tbody');
                console.log(table);
                let row = table.insertRow(-1); 
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
            

   // Add data to c1 and c2
                cell1.innerText = username;
                cell2.innerText = mark;


            console.log(document.getElementsByTagName('table').innerHTML);
            };




    </script>
            <?php
        session_start() ;
        if (isset($_COOKIE['currentUser'])){
            echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>";
            } else{
                echo "<script>window.location.replace('./index.php');</script>";
                }
            

                /*$table = $_SESSION['usersPast']; */


        if(!empty( $_SESSION['usersPast'])){
            $table = $_SESSION['usersPast'];
            $table[$_COOKIE['currentUser']] = $_COOKIE['userScore'];
            arsort($table);
            $_SESSION['usersPast'] = $table; 
        } else{
            $table[$_COOKIE['currentUser']] = $_COOKIE['userScore'];
            arsort($table);
            $_SESSION['usersPast'] = $table; 
        }
        foreach($_SESSION['usersPast'] as $x => $x_value) {
            echo "<script>  populateTable('$x','$x_value');</script>";
          }
                ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>