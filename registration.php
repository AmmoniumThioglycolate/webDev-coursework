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

    }


    </style>
  </head>

<body>
    <!--In the body we add our content -->
    <?php include './navbar.php'; ?>
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
                <th colspan=3>Select a character from the table</th>
            </tr>
            <tr>
                <td>image1</td>
                <td>image2</td>
                <td>image3</td>
            </tr>
            <tr>
                <td>image4</td>
                <td>image5</td>
                <td>image6</td>
            </tr>
        </table>
        <br/>
        <button type="submit" name='registerButton' class="btn btn-primary">Register</button>
        <?php
            session_start();
            $userScore = 0;
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
                } else{ echo "\n suitable username <script>elem = document.getElementById('basic-addon4'); elem.style.visibility='hidden'; elem.style.bordercolor=''; console.log('it happened');</script>";
                     $firstreg += 1;
                     setcookie("currentUser",$nickname, time() + (86400*5), "/"); }
            }
            }
            $cookievalue = [$nickname,$userScore,$userAvatar];

        ?>
    </form>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>