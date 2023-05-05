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
    <script src ='./script.js'></script>
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
            <tbody id='tbody'>
            <tr id=placeholder> <td>No Players</td> <td>No Scores To Show</td></tr>
            </tbody>
        </table>

    </div>


    <script>
        

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

        function triggerPopulateTable(){
            sortedList.forEach(element => {
                populateTable(element.user,element.score)

            });

        }



 
  
        
             function populateTable(username,mark){
                document.getElementById('placeholder').style.display= 'none';
                
                let table = document.getElementById('tbody');
                let row = table.insertRow(-1); 
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
   // Add data to c1 and c2
                cell1.innerText = username;
                cell2.innerText = mark;


            
            };
    </script>
    <?php
        session_start();

        if (isset($_COOKIE['currentUser'])){
            echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>";
            } else{
                echo "<script>window.location.replace('./index.php');</script>";
                }


        //read in the json file
        $json_file = file_get_contents('./leaderboard.json');

        //decode the json file
        $data_from_json = json_decode($json_file,true);
        
        $add_data = array('user' => $_COOKIE['currentUser'],'score' => intval($_COOKIE['userScore']) );
        array_push($data_from_json,$add_data);
        $jsonData = json_encode($data_from_json);

        if(file_put_contents(__DIR__ . '/leaderboard.json',$jsonData)){
            echo "<script>console.log('success');</script>";

        } else { echo "<script>console.log('fail');</script>";} 

        //read in the json file
        $json_file_updated = file_get_contents('leaderboard.json');

        //decode the json file
        $data_json = json_decode($json_file_updated,true);
        $data_json = json_encode($data_json);

        echo "<script>console.log('stuff $data_json');var sortedList = sortThroughArray($data_json);triggerPopulateTable()</script>";
        //print_r($data_json);
        //echo "<script>console.log('$data_json');</script>";





        ?>
        <script>
            console.log(sortedList);
        </script>







            



    


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>
