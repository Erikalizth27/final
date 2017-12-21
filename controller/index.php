<?php
require('../model/connection.php');
require('../model/database.php');
$action = filter_input(INPUT_POST,'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}
if ($action == 'action') {
    $user_email = filter_input(INPUT_POST, 'user_email');
    $user_pass = filter_input(INPUT_POST, 'user_password');
    $category_name = get_userinfo($user_email);
    $name = '';
    $lastname = '';
    $pass = '';
    foreach ($category_name as $valor) {
        $name = $valor[0];
        $lastname = $valor[1];
        $pass = $valor[2];
    }
    if ($pass == $user_pass) {
        $tmp = '';
        $list_todo = get_todos($user_email);
        foreach ($list_todo as $valor) {
            $tmp = $valor[0];
        }
        include('../signup.php');
    }
    else {
        echo 'Password incorrecto';
    }   
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    if ( $product_id == NULL) {
        echo "Missing or incorrect product id or category id.";
    } else { 
        delete_todos($product_id);
        include('login.php'); 
  
    }
} else if ($action == 'show_add_form') {
    
    include('../additem.php'); 

}  else if ($action == 'add_item') {
    $owneremail = 'mjlee@njit.edu';
    $ownerid = '1';
    $mesage = filter_input(INPUT_POST, 'message');
    $isdone = filter_input(INPUT_POST, 'isdone');
    $create_date = date('Y-m-d H:i:s');
    $due_date = strtotime(filter_input(INPUT_POST, 'due_date'));
    $duedate = date('Y-m-d H:i:s',$due_date);

    if  ($mesage == NULL || $isdone == NULL || $create_date == NULL || $duedate == NULL) {
        echo "Invalid product data. Check all fields and try again.";
    } else { 
        add_item($owneremail,$ownerid,$create_date,$duedate,$mesage, $isdone);
        include('login.php');
    }
} else if ($action == 'edit_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    if ( $product_id == NULL) {
        echo "Missing or incorrect product id or category id.";
    } else { 

        edit_item($product_id);
        include('login.php'); 
  
    }
}
?>