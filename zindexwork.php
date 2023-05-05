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
        div{
            height:300px;
            width:300px;
            top:5px;
        }


    </style>  
    <link rel="stylesheet" type="text/css" href="stylesPairs.css"/>
    <script src ='./script.js'></script>
  </head>

<body>
    <script>
 function loadImages(imageURLs) {
  return Promise.all(imageURLs.map((url) => {
    return new Promise((resolve, reject) => {
      const img = new Image();
      img.onload = () => {
        resolve(img);
      };
      img.onerror = (error) => {
        reject(error);
      };
      img.src = url;
    });
  }));
}

function layerImages(background, foreground1, foreground2) {
  return new Promise((resolve, reject) => {
    // create a canvas element
    const canvas = document.createElement("canvas");
    const ctx = canvas.getContext("2d");

    // set the canvas dimensions
    canvas.width = 500;
    canvas.height = 500;

    // draw the images on the canvas in the desired order
    ctx.drawImage(background, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(foreground1, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(foreground2, 0, 0, canvas.width, canvas.height);

    // convert the canvas to a data URL and resolve the promise
    const layeredDataURL = canvas.toDataURL();
    resolve(layeredDataURL);
  });
}




  loadImages(['./emoji assets/skin/green.png', './emoji assets/eyes/closed.png', './emoji assets/mouth/surprise.png']).then((images) => {
  // call the layerImages function with the loaded images
  return layerImages(images[0], images[1], images[2]);
}).then((layeredDataURL) => {
  console.log(layeredDataURL);
    // do something with the resulting data URL, such as displaying it on the page or downloading it
}).catch((error) => {
  // handle errors when loading or layering the images
});

    </script>




</body >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>