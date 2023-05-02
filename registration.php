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
        width:80%;
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
    <form>
        <h5>Please type in your nickname</h5>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Enter a nickname">
             <label style="color:black"for="floatingInput">Nickname</label>
   <!--In the body we add our content 
   <form class="form-floating">
  <input type="email" class="form-control is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com">
  <label for="floatingInputInvalid">Invalid input</label>
</form>

when input is invalid chnage it to this


-->
        </div>
        <div style="color:white "class="form-text" id="basic-addon4">Your nickname must not include: ”! @#%&^*()+={}[] —;: “’<>? /</div>

  
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
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>