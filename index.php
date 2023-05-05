<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home</title>  
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 
    <style>
        .main{
            text-align:center;
            color:whitesmoke;
            position:absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%, -50%);

        }
        #not_welcome{
            top:60%;
            transform: translate(-60%, -50%;)

        }


    </style>  
    <link rel="stylesheet" type="text/css" href="stylesPairs.css"/>
    <script src ='./script.js'></script>
  </head>

<body>

    <!--In the body we add our content -->
    <?php 
        include './navbar.php';
    ?>
    <div class='main'>
    <h1 >Welcome to Pairs</h1>
    <?php 
        session_start() ;

        if (isset($_COOKIE['currentUser'])){
            echo "<a style='background-color:green;'class='btn btn-success btn-lg' href='./bootspairs.php' role='button'>Click Here To Play</a>";
            echo "<script>document.getElementsByName('leaderboard')[0].style.display='';</script>";
        } else{
            echo "<h3 id='not_welcome'>You're not using a registered session?</h3> <a class='icon-link icon-link-hover' style='--bs-icon-link-transform: translate3d(0, -.125rem, 0);' href='./registration.php'><svg class='bi' aria-hidden='true'><use xlink:href='#clipboard'></use></svg><h3 id='not_welcome'>Register now</h3></a>";
            }
    ?>
    <br/>

    </div>
</body >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>