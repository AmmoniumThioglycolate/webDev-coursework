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
            
    }
    table {
        border:2px;
        min-height: 50vh;
        background-color:white;
        margin-bottom: 0;
    }
    thead{
        background-color: rgb(25, 167, 206) ;
    }

    </style>
  </head>

<body>
    <!--In the body we add our content -->
    <?php 
        include './navbar.php'; 
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
            $table['regtur'] = 65;
            $table['reggy'] = 64;
            $table['regg4'] = 60;
            $table['regga'] = 7;
            arsort($table);
            $_SESSION['usersPast'] = $table; 
        } else{
            $table[$_COOKIE['currentUser']] = $_COOKIE['userScore'];
            $table['regtur'] = 65;
            $table['reggy'] = 64;
            $table['regg4'] = 60;
            $table['regga'] = 7;
            arsort($table);
            $_SESSION['usersPast'] = $table; 

        }
        foreach($_SESSION['usersPast'] as $x => $x_value) {
            echo "<script>  populateTable('$x','$x_value');</script>";
          }
        
            





                ?>


    <br/><br/>
    <div class="board">
        <table id="leadertable" style="margin-bottom:0;"class="table table-striped-column table-hover">
            <thead>
                <tr style="text-align:center">
                    <th colspan="3">Pairs Leaderboard</th>
                </tr>
                <tr style="background-color:rgb(175, 211, 226)">
                    <th>Player Name</th>
                    <th id="noStyle">Score</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td>Test data</td>
                    <td>Test data</td>
                </tr>
                <tr>
                    <td>Test data</td>
                    <td>Test data</td>
                    <td>Test data</td>
                </tr>
                
               
        </tbody>
        </table>

    </div>


    <script >
             function populateTable(username,mark){
                let tableTag = document.createElement('tr');
                
                tableTag.innerHTML = '<td>' + username + '</td>' + '<td>' + mark + '</td>';
                
               document.getElementsByTagName('tbody')[0].append(tableTag);
                
            };




    </script>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>