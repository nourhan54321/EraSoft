<?php 
$errors = [];
$f=new Functions();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $f->trim($_POST['name']);
    $email = $f->trim($_POST['email']);
    $phone = $f->trim($_POST['phone']);
    $password = $f->trim($_POST['password']);

    if ($f->empty($name)){
        $errors['name']="Name is empty";
       }
    elseif($f->strlen($name,3,30)){
        $errors['name']="name length must be between 3 and 30 characters.";
    }

    if($f->empty($email)){
        $errors['email']="Email is empty";
    }
    elseif($f->filterEmail($email)){
        $errors['email'] = "please enter a valid email";
    }

    if ($f->empty($password)){
        $errors['password']="Password is empty";
       }
    elseif($f->strlen($password,5,20)){
        $errors['password']="Password length must be between 5 and 20 characters.";
    }

    if ($f->empty($phone)){
        $errors['phone']="Phone is empty";
       }
    elseif($f->strlen($phone,3,30)){
        $errors['phone']="Phone length must be between 3 and 30 characters.";
    }


    if(empty($errors)){
        $_SESSION['errors']=[];
        $password = sha1($password);
        $_SESSION['is_logged'] = true;
        $sql = "INSERT INTO `users` (`name`, `email`, `password`,`phone`) VALUES ('$name', '$email', '$password','$phone' )";
        $result = mysqli_query($conn, $sql);
        $_SESSION['auth']=[
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "password" => $password,
            // "type" => 'user',

        ];
        $f->redirect("http://127.0.0.1/clinic2/clinic2/clinic/index.php?page=home");

    //     $f->dd($_SESSION);
     }
    else {
    $_SESSION['errors'] = $errors;
    $_SESSION['is_logged'] = false;
    } 


$f->redirect("http://127.0.0.1/clinic2/clinic2/clinic/index.php?page=register");

}


?>