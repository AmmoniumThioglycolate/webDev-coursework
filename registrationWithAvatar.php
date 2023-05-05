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
    background-color: papayawhip;

    }
    th{
        text-align:center;

    }

    td{
        width: 9vh;
    }
    img{
        height:8vh;
        width:8vh;
        
    }
    .skinImages img{
        margin-left:25%;
    }
    th {
        color:black;
    }
    h3{
        margin-top: 5vh;
    }


    </style>
    <script src ='./script.js'></script>
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
         <table name = 'table'>
            <tr>
                <th colspan=6>Select a skin hue</th>
            </tr>
            <tr class='skinImages'>
                <td colspan=2><img onclick="select(this)" src='./emoji assets/skin/green.png'/></td>
                <td colspan=2><img onclick="select(this)" src='./emoji assets/skin/red.png'/></td>
                <td colspan=2><img onclick="select(this)" src='./emoji assets/skin/yellow.png'/></td>
            </tr>
            <tr>
                <th colspan=6>Select your eyes</th>
            </tr>
            <tr class='eyeImages'>
                <td><img onclick="select(this)" src='./emoji assets/eyes/closed.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/eyes/laughing.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/eyes/long.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/eyes/normal.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/eyes/rolling.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/eyes/winking.png'/></td>
            </tr>
            <tr><th colspan=6>Select your mouth</th></tr>
            <tr class='mouthImages'>
                <td><img onclick="select(this)" src='./emoji assets/mouth/open.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/mouth/sad.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/mouth/smiling.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/mouth/straight.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/mouth/surprise.png'/></td>
                <td><img onclick="select(this)" src='./emoji assets/mouth/teeth.png'/></td>
            </tr>
        </table>
        <br/>
        <input type="hidden" id="imagelink" name="imagelink"></input>
        <button type="submit" onclick='triggerCreateAvatar()' name='registerButton' class="btn btn-primary">Register</button>
        
        <script>
            
            var skinSelected = './emoji assets/skin/green.png';
            var eyeSelected ='./emoji assets/eyes/closed.png';
            var mouthSelected = './emoji assets/mouth/open.png';


            function select(item){
                console.log(item);
                console.log(item.style.borderColor);
                setSelect(item);
                itemClassName= item.parentElement.parentElement.className;
                const fulltable = document.getElementsByClassName(itemClassName)[0];
                
                tableItems = fulltable.getElementsByTagName('td');

                [...tableItems].forEach(element => {
                    if (element.getElementsByTagName('img')[0] == item){
                        console.log('huzzahh');
                    } else {setSelectBack(element.getElementsByTagName('img')[0])}
                    console.log(element.getElementsByTagName('img')[0]);
                    
                });
                switch (itemClassName){
                    case 'skinImages':
                        console.log(item.getAttribute('src'));
                        skinSelected = item.getAttribute('src');
                        break;

                        
                    case 'eyeImages':
                        console.log(item.getAttribute('src'));
                        eyeSelected = item.getAttribute('src');
                        console.log(skinSelected);
                        break;

                    case 'mouthImages':
                        console.log(item.getAttribute('src'));
                        mouthSelected = item.getAttribute('src');
                        triggerCreateAvatar();
                        break;

                }                  

            }
            function setSelectBack(item){
                item.style.border = '';
                item.style.borderStyle = '';
                item.style.borderColor = '';
                item.style.backgroundColor = '';

            }
            function setSelect(item){
                item.style.backgroundColor = 'red';
                item.style.border = '3px';
                item.style.borderStyle = 'solid';
                item.style.borderColor = 'orange';
            }
            function triggerCreateAvatar(){
                var avatarLink = createAvatar(skinSelected,eyeSelected,mouthSelected);
              Promise.all([avatarLink]).then(() => {
                console.log("avatarlink",avatarLink);
                setAvatarLocalStorage();
                console.log('triggered');
                //might delete
                document.getElementById('imagelink').setAttribute('value',localStorage.getItem('avatar'));
                });
            }

       


        </script>
        <?php
            session_start();
            $nickname ='';
            $_SESSION['avatarImageFile'] = $_POST['imagelink'];

            if (!empty($_POST['nickname'])){
                $nicknamePre = $_POST['nickname'];
                echo $nicknamePre;
                } 
                else {echo "no nickname was entered";}
                    $firstreg = 0;
            $pattern = '/\W/'; //used to detect any non-word character
            if(isset($_POST['registerButton']) and $firstreg == 0){
            echo "register button";
            if (!empty($_POST['nickname'])){
                $firstreg += 1;
                if (preg_match($pattern,$nicknamePre)){
                    echo "\n unsuitable username";
                    echo "<script>elem = document.getElementById('basic-addon4'); elem.style.visibility='visible';document.getElementsByName('nickname')[0].className='form-control is-invalid';document.getElementById('nickNameBox').setAttribute('value','$nicknamePre'); console.log('it happened');</script>";
                } else{ 
                    echo "\n suitable username <script>elem = document.getElementById('basic-addon4'); elem.style.visibility='hidden'; elem.style.bordercolor=''; console.log('it happened');</script>";
                     $firstreg += 1;
                     $nickname = $_POST['nickname'];
                     setcookie("currentUser",$nickname, time() + (86400*5), "/");
                    $_SESSION['currentUser']= $nickname; }
            } else {
                echo "<script>elem = document.getElementById('basic-addon4');document.getElementsByName('nickname')[0].className='form-control is-invalid';document.getElementById('nickNameBox').setAttribute('value','$nicknamePre'); console.log('it happened');</script>";
            }
            }

        ?>
    </form>
  </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>