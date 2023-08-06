
//this function delays the pag eload for a while
function delay(time) {return new Promise(resolve => setTimeout(resolve, time))}
//This adds the avatar profile to the navigation bar
function addProfile(){
    if (typeof localStorage.getItem('avatar') !== undefined){
        console.log('entered localstorage');
        let listItem = document.createElement('li');
    

        let Image = document.createElement("img");
        Image.setAttribute('src',localStorage.getItem('avatar'));
        
        listItem.appendChild(Image);

        document.getElementById('menuNav').insertBefore(listItem,document.getElementById('menuNav')[1]);
    }


};

// this function creates a cookie
function setCookie(cname, cvalue, expirydays){
    const date = new Date();
    date.setTime(date.getTime() + (expirydays*24*60*60*1000));
    let expires = "expires="+ date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// this will store the avatar url to the local storage of the user's computer
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

// convert the canvas to a data URL for display and then to reload it
    const avatarDataURL = canvas.toDataURL();
    avatarUrl = avatarDataURL;
    console.log(avatarDataURL);
    return avatarDataURL;

}); }


   
