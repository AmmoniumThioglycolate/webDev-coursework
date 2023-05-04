<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="stylesPairs.css" />
    <style>
        .main-components{
        text-align:left;
        position:absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%, -50%);
        margin:auto;
        color:aliceblue;
    }
    table{
    border-style:groove;
    border-width:7px;
    border-color:blue;
    background-color: whitesmoke;

    }
    img{
        height:8vh;
        width:8vh;
    }
    th {
        color:black;
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
                
                }
     ?>
    <br/><br/>
  
  <div class="main-components">
    <h3>Welcome to the registration page. Please fill in your data in order to play Pairs.</h3>
    <form action="#" method="POST">
        <h5>Please type in your nickname</h5>
        <div class="form-floating mb-3">
            <input  id="nickNameBox" name = "nickname"  class="form-control" id="floatingInput" placeholder="Enter a nickname"/>
             <label style="color:black"for="floatingInput">Nickname</label>
   <!--In the body we add our content 
   <form class="form-floating">
  <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com">
  <label for="floatingInputInvalid">Invalid input</label>
</form>

when input is invalid chnage it to this


-->
        </div>
        <div style="visibility:hidden;width:79%;color:white;font-weight:bold;background-color:red;" class="form-text" id="basic-addon4">Your nickname must not include: ”!@#%&^*()+={}[] —;:“’<>?/</div>

  
    <p>Select your avatar</p>
         <table>
            <tr>
                <th colspan=6>Select a skin hue</th>
            </tr>
            <tr>
                <td colspan=2><img src='./emoji assets/skin/green.png'/></td>
                <td colspan=2><img src='./emoji assets/skin/red.png'/></td>
                <td colspan=2><img src='./emoji assets/skin/yellow.png'/></td>
            </tr>
            <tr colspan=6><th>Select your eyes</th></tr>
            <tr>
                <td><img src='./emoji assets/eyes/closed.png'/></td>
                <td><img src='./emoji assets/eyes/laughing.png'/></td>
                <td><img src='./emoji assets/eyes/long.png'/></td>
                <td><img src='./emoji assets/eyes/normal.png'/></td>
                <td><img src='./emoji assets/eyes/rolling.png'/></td>
                <td><img src='./emoji assets/eyes/winking.png'/></td>
            </tr>
            <tr colspan=6><th>Select your mouth</th></tr>
            <tr>
                <td><img src='./emoji assets/mouth/open.png'/></td>
                <td><img src='./emoji assets/mouth/sad.png'/></td>
                <td><img src='./emoji assets/mouth/smiling.png'/></td>
                <td><img src='./emoji assets/mouth/straight.png'/></td>
                <td><img src='./emoji assets/mouth/surprise.png'/></td>
                <td><img src='./emoji assets/mouth/teeth.png'/></td>
            </tr>
        </table>
        <br/>
        <button type="submit" name='registerButton' class="btn btn-primary">Register</button>
        
        <script>
            // create a canvas element
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");

            // set the canvas dimensions
            canvas.width = 500;
            canvas.height = 500;

            // load the avatar images
            const skin = new Image();
            const eyes = new Image();
            const mouth = new Image();
        
            skin.src = "./emoji assets/skin/green.png";
            eyes.src = "./emoji assets/eyes/laughing.png";
            mouth.src = "./emoji assets/mouth/smiling.png";
            

            // wait for all images to load
            Promise.all([skin, eyes, mouth]).then(() => {
            // draw the images on the canvas in the desired order
            ctx.drawImage(skin, 0, 0, canvas.width, canvas.height);
            ctx.drawImage(eyes, 0, 0, canvas.width, canvas.height);
            ctx.drawImage(mouth, 0, 0, canvas.width, canvas.height);

  // convert the canvas to a data URL for display or download
            const avatarDataURL = canvas.toDataURL();
            console.log(avatarDataURL);


  // do something with the avatar data URL, such as displaying it on the page or downloading it
});

        </script>
        <?php
            session_start();
            $nickname ='';
            $userAvatar ='';

            if (!empty($_POST['nickname'])){
                $nickname = $_POST['nickname'];
                echo $nickname;
                } 
                else {echo "no nickname was entered";}
            if (!empty($_POST['avatar'])){
                    $userAvatar = $_POST['avatar'];
                    } 
                    else {echo "no avatar was selected";}
                    $firstreg = 0;
            $pattern = '/\W/'; //used to detect any non-word character
            if(isset($_POST['registerButton']) and $firstreg == 0){
            echo "register button";
            if (!empty($_POST['nickname'])){
                $firstreg += 1;
                if (preg_match($pattern,$nickname)){
                    echo "\n unsuitable username";
                    echo "<script>elem = document.getElementById('basic-addon4'); elem.style.visibility='visible';document.getElementsByName('nickname')[0].className='form-control is-invalid';document.getElementById('nickNameBox').setAttribute('value','$nickname'); console.log('it happened');</script>";
                } else{ 
                    echo "\n suitable username <script>elem = document.getElementById('basic-addon4'); elem.style.visibility='hidden'; elem.style.bordercolor=''; console.log('it happened');</script>";
                     $firstreg += 1;
                     setcookie("currentUser",$nickname, time() + (86400*5), "/");
                    $_SESSION['currentUser']= $nickname; }
            }
            }
            $cookievalue = [$nickname,$userScore,$userAvatar];

        ?>
    </form>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>