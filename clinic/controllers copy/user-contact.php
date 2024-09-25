<?php 
  $errors = [];
  $c = new Functions;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $c->trim($_POST['name']);
    $email = $c->trim($_POST['email']);
    $subject = $c->trim($_POST['subject']);
    $message =$c->trim( $_POST['message']);
    $phone = $c->trim($_POST['phone']); 

       if ($c->empty($name)){
        $errors['name']="Name is empty";
       }
       elseif($c->strlen($name,3,30) ){
        $errors['name']="name length must be between 3 and 30 characters.";
       }
      
       if ($c->empty($email)){
        $errors['email'] = "Email is empty";
       }
       elseif($c->filterEmail($email)){
        $errors['email'] = "please enter a valid email";
       }
      
      
      if ($c->empty($subject)) {
        $errors['subject'] = "subject is empty";
      }
      
      if($c->empty($message)){
        $errors['message'] = "message is empty";
      }
      elseif ($c->strlen($message,10,500)) {
        $errors['message'] = "The message length must be between 10 and 500 characters.";
      } 

      if ($c->empty($phone)){
        $errors['phone']="Phone is empty";
       }
      elseif($c->strlen($phone,3,30)){
        $errors['phone']="Phone length must be between 3 and 30 characters.";
       }


      if (empty($errors)) {
        $_SESSION['errors'] = [];
        $_SESSION['success'] = "success";
        $sql = "INSERT INTO `message` (`name`, `email`, `subject`, `message` , `phone`)
         VALUES ('$name', '$email', '$subject', '$message','$phone')";
        $result = mysqli_query($conn, $sql);

       }
      
        else {
          $_SESSION['errors'] = $errors;
        }
      
        $c->redirect("http://127.0.0.1/322/clinic2/clinic/index.php?page=contact");
  }