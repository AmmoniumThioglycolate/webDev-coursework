<!DOCTYPE html > <!-- We can specify the version of html-->
<head>
    <!--Meta data goes in the head-->
    <meta charset = "UTF-8"/>
    <meta name ="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>  
     <!-- Importign the bootstrap stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./stylesPairs.css"/>
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
    /* This table is for helping select the user's avatar.*/
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
        margin-left:25%; /* to help centre the skin images*/
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
  <?php
        //I didnt want to load unto a new page. So when the form is submitted it loads unto itself, as i felt this would be slightly easier
        
            session_start();
            $nickname ='';
            
            //this checks that the post attribute 'nickname' is not empty. If it isn't it saves it as a variable
            if (!empty($_POST['nickname'])){
                $nickname = $_POST['nickname'];

                        //this part sets the cookies and then sends the user back to the home page to them click and play pairs
                        setcookie("currentUser",$nickname, time() + (86400), "/"); //creates the current user cookie
                        $_SESSION['currentUser']= $nickname; //creates the current user session
                        setcookie('justRegistered','yes',time() + 60);
                        //This adds 'you have now been registered' when the current user has been created properly and hides the unsuitable username text (if it was there)
                        echo "<script>window.location.replace('./index.php');</script>";
                    
                
                } 
                    
            
      

            
            //$cookievalue = [$nickname,$userScore,$userAvatar];
        ?>
<body>
    <div id='main'>
    <!--In the body we add our content -->
    <?php 
    include './navbar.php';
    // this adds the navbar and if the current user is already set, then the leaderboard is visible
        session_start() ;
        if (isset($_COOKIE['currentUser'])){
            echo "<script>document.getElementsByName('leaderboard')[0].style.display='initial';</script>";
            } else{
                
                }
     ?>
    <br/><br/>
  
  <div class="main-components">
    <h3>Welcome to the registration page. Please fill in your data in order to play Pairs.</h3>
    <!-- This is the start of the form-->
    <form onsubmit="event.preventDefault(); validateTheEntries();" action="#" method="POST">
        <h5>Please type in your nickname</h5>
        <div class="form-floating mb-3">
            <input value='' id="nickNameBox" name ="nickname"  class="form-control" id="floatingInput" placeholder="Enter a nickname"/>
             <label style="color:black"for="floatingInput">Nickname</label>
   <!--In the body we add our content 
   <form class="form-floating">
  <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com">
  <label for="floatingInputInvalid">Invalid input</label>
</form>

when input is invalid chnage it to this


-->
        </div>
         <!-- This appears when the username is invalid-->
        <div style="visibility:hidden;width:79%;color:white;font-weight:bold;background-color:red;" class="form-text" id="basic-addon4">Your nickname must not include: ”!@#%&^*()+={}[] —;:“’<>?/</div>

     <!-- This is the code for the avatar selector. Each attribute is set in rows (3 in total)-->
    <h4>Select your avatar</h4>
         <table name = 'table'>
            <tr>
                <th colspan=6>Select a skin hue</th>
            </tr>
            <tr class='skinImages'>
                <td colspan=2><img onclick="select(this)" src='./emoji assets/skin/green.png'/></td>  <!-- Each one spans 2 columns to help keep things balanced-->
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
        <button type="submit" name='registerButton' class="btn btn-primary">Register</button>
  
        



    </form>
  </div>
  


<script>
            //These are the base attributes for the avatar, incase an avatar isn't selected
            var skinSelected = './emoji assets/skin/green.png';
            var eyeSelected ='./emoji assets/eyes/closed.png';
            var mouthSelected = './emoji assets/mouth/open.png';




            /*This function is to select the avatar. In the main html script, there are onclick trigger events
            When the item is clicked this function is called and the item is passed into the function */
            function select(item){
                setSelect(item);
                itemClassName= item.parentElement.parentElement.className; //this is used to get the class name
                // this is used to get the collection of all the items in that specific collection of assets
                const fulltable = document.getElementsByClassName(itemClassName)[0]; 
                
                tableItems = fulltable.getElementsByTagName('td');

                // this is used to reverse any effects after a new item is selected
                [...tableItems].forEach(element => {
                    if (element.getElementsByTagName('img')[0] == item){
                        
                    } else {setSelectBack(element.getElementsByTagName('img')[0])}
                    ;
                    
                });
                switch (itemClassName){
                    case 'skinImages':
                        
                        skinSelected = item.getAttribute('src');
                        break;

                        
                    case 'eyeImages':
                        
                        eyeSelected = item.getAttribute('src');
                        console.log(skinSelected);
                        break;

                    case 'mouthImages':
                        
                        mouthSelected = item.getAttribute('src');
                        break;
                        

                }  
                // this calls the function that will then call the function that makes the avatar
                              

            }
            // this reverse the styles added to a selcted item
            function setSelectBack(item){
                item.style.border = '';
                item.style.borderStyle = '';
                item.style.borderColor = '';
                item.style.backgroundColor = '';

            }
            // this adds a border and an effect that the item has been selected
            function setSelect(item){
                item.style.backgroundColor = 'red';
                item.style.border = '3px';
                item.style.borderStyle = 'solid';
                item.style.borderColor = 'orange';
            }
            // this calls the function to help create the avatar (as it takes a while to make)
            function triggerCreateAvatar(){
                var avatarLink = createAvatar(skinSelected,eyeSelected,mouthSelected);
              Promise.all([avatarLink]).then(() => {
                //might cause a mistake later look here
                setAvatarLocalStorage();
                console.log('triggered');
                });
            }

            function validateTheEntries(){
                //im going to do a preg match here in js to make sure the entry doesnt have a wrong thing
            const pattern = /\W/i; //find a none word character
            const Nickname_entry = (document.getElementById('nickNameBox')).value;
            console.log(Nickname_entry);
                if (pattern.test(Nickname_entry) == true ){
                    elem = document.getElementById('basic-addon4'); 
                    elem.style.visibility='visible';
                    document.getElementById('nickNameBox').className ='form-control is-invalid';
                    document.querySelector('h5').innerHTML = "That is an unsuitable username. Please type in something new";
                    return false;
                } else {
                    // the nickname is correct so an avatar is made and i submit the form using JS
                    triggerCreateAvatar(); 
                    document.querySelector('form').setAttribute("onsubmit"," ");
                    document.querySelector('form').submit();
                    alert('You are now registered to play Pairs');
                    return true;
                }
            }

        </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </div>
 
</body>

</html>