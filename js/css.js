document.write('\
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">\
<script src="js/jquery.min.js"></script>\
<link rel="stylesheet" href="assets/css/bootstrap.css">\
<script src="js/bootstrap.min.js"></script>\
<script src="js/menus.js" type="text/javascript"></script>\
<link rel="stylesheet" type="text/css" href="assets/css/login-panel.css" />\
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />\
<meta http-equiv="Content-Language" content="th">\
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">\
');

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

function imgerror(image) {
    image.onerror = "";
    image.src = image.src.replace("4.jpg", getRandomInt(1, 3) + ".jpg");
    return true;
}
