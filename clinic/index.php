

<?php 
if(isset($_GET['page'])){
switch($_GET['page']){
    case "home":
        require_once  "home.php";
        break;
    case "majors":
        require_once "majors.php";
        break;
    case "contact":
        require_once "contact.php";
        break;
    case "doctor":
        require_once "doctor.php";
        break;
    case "single-doctor":
        require_once "single-doctor.php";
        break; 
    case "register":
        require_once "register.php";
        break;
    case "login":
        require_once "login.php";
        break; 
    case "logout":
        require_once "logout.php";
        break;
    case 'user-register':
        require_once './controllers/user-register.php';
            break;   
    case 'user-contact':
        require_once './controllers/user-contact.php';
            break;  
    case 'user-login':
        require_once 'C:\xamppnew\htdocs\All\clinic\controllers copy\user-login.php';
            break;
     case 'user-doctor':
        require_once './controllers/user-doctor.php';
            break;   
        default:
       require_once "101.php";
}
}else{
    require_once "login.php";

}