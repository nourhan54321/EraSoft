<?php 
require_once('./cor/functions.php');
$errors = [];
$n = new Functions();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $n->trim($_POST['email']);
    $password = $n->trim($_POST['password']);


    if($n->empty($email)){
        $errors['email']="Email is empty";
    }
    elseif($n->filterEmail($email)){
        $errors['email'] = "please enter a valid email";
    }

    if ($n->empty($password)){
        $errors['password']="Password is empty";
       }
    elseif($n->strlen($password,5,20)){
        $errors['password']="Password length must be between 5 and 20 characters.";
    }



    if (empty($errors)) {
        $password = sha1($password);
        $_SESSION['errors'] = [];
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION['is_logged'] = true;
            $_SESSION['auth'] = [
                "name" => $user['name'],
                "email" => $user['email'],
              
            ];
    
            $n->redirect("http://127.0.0.1/All/clinic/index.php?page=home");
        } else {
            $errors['login'] = "Invalid email or password";
            $_SESSION['errors'] = $errors;
            $_SESSION['is_logged'] = false;
            $n->redirect("http://127.0.0.1/All/clinic/index.php?page=login");
        }
    } else {
    
        $_SESSION['errors'] = $errors;
        $_SESSION['is_logged'] = false;
        $n->redirect("http://127.0.0.1/All/clinic/index.php?page=login");
    }

// $n->redirect("http://127.0.0.1/322/clinic2/clinic/index.php?page=login");
}



?>