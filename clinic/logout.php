<?php 
require_once('./cor/functions.php');
 unset($_SESSION['auth']);
 $_SESSION['is_logged'] = false;
 $l=new Functions();
 $l->redirect("http://127.0.0.1/All/clinic/index.php?page=login");

?>