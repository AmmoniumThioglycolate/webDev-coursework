/*function populateTable(username,mark){
    document.getElementById("leaderid").append(username);
    document.getElementById("leaderid").append(mark);

}; */
var kellogs = 'kellyClarkson';

function addProfile(){
    if (typeof localStorage.getItem('avatar') !== undefined){
        console.log('entered localstorage');
        let listItem = document.createElement('li');

        let Image = document.createElement("img");
        Image.setAttribute('src',localStorage.getItem('avatar'));
        listItem.appendChild(Image);

        document.getElementById('menuNav').insertBefore(Image,document.getElementById('menuNav')[1]);
    }


};

function setCookie(cname, cvalue, expirydays){
    const date = new Date();
    date.setTime(date.getTime() + (expirydays*24*60*60*1000));
    let expires = "expires="+ date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setAvatarLocalStorage(){
    window.localStorage.setItem('avatar',avatarUrl);
}

var avatarUrl;

function createAvatar(skinInput,eyeInput,mouthInput){
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

    skin.src = skinInput;
    eyes.src = eyeInput;
    mouth.src = mouthInput;
    

    // wait for all images to load
    Promise.all([skin, eyes, mouth]).then(() => {
    // draw the images on the canvas in the desired order
    ctx.drawImage(skin, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(eyes, 0, 0, canvas.width, canvas.height);
    ctx.drawImage(mouth, 0, 0, canvas.width, canvas.height);

// convert the canvas to a data URL for display or download
    const avatarDataURL = canvas.toDataURL();
    avatarUrl = avatarDataURL;
    console.log(avatarDataURL);
    return avatarDataURL;
// do something with the avatar data URL, such as displaying it on the page or downloading it
}); }


   

    /*list.forEach(element => {
        index++;

        if (max < element.user){
            max = list[index].score;
            let temporary = 



        } 
        console.log(element.user); 
        

    }); */
    const iconsEyes = ['./emoji assets/eyes/closed.png','./emoji assets/eyes/laughing.png','./emoji assets/eyes/long.png','./emoji assets/eyes/normal.png','./emoji assets/eyes/rolling.png','./emoji assets/eyes/winking.png'];
    const iconsSkin = ['./emoji assets/skin/green.png','./emoji assets/skin/red.png','./emoji assets/skin/yellow.png'];
    const iconsMouths = ['./emoji assets/mouth/open.png','./emoji assets/mouth/sad.png','./emoji assets/mouth/smiling.png','./emoji assets/mouth/straight.png','./emoji assets/mouth/surprise.png','./emoji assets/mouth/teeth.png'];
    var  iconS=[];

