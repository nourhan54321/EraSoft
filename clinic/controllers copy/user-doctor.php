<?php 
  $errors = [];
  $d = new Functions;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $d->trim($_POST['name']);
    $email = $d->trim($_POST['email']);
    $phone = $d->trim($_POST['phone']); 
    $doctor_id = $_POST['doctorid'] ;

       if ($d->empty($name)){
        $errors['name']="Name is empty";
       }
       elseif($d->strlen($name,3,30) ){
        $errors['name']="name length must be between 3 and 30 characters.";
       }
      
       if ($d->empty($email)){
        $errors['email'] = "Email is empty";
       }
       elseif($d->filterEmail($email)){
        $errors['email'] = "please enter a valid email";
       }
      
      if ($d->empty($phone)){
        $errors['phone']="Phone is empty";
       }
      elseif($d->strlen($phone,3,30)){
        $errors['phone']="Phone length must be between 3 and 30 characters.";
       }


      if (empty($errors)) {
        $_SESSION['errors'] = [];
        $_SESSION['success'] = "success";
       }
      
        else {
          $_SESSION['errors'] = $errors;
        }

        if ($doctor_id) {
          $d->redirect("http://127.0.0.1/322/clinic2/clinic/index.php?page=doctor&doctorid=" . $doctor_id);
      } else {
          echo "Doctor ID not found!";
      }
        
  }