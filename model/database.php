<?php
function get_userinfo($user_email) 
{
    global $db;
    $query = 'SELECT fname,lname,password FROM accounts
              WHERE email = :user_email';
              
    $statement = $db->prepare($query);
    $statement->bindValue(":user_email", $user_email);
    $statement->execute();
    $useremail = $statement->fetchAll();
    $statement->closeCursor();
    return $useremail;
}
function get_todos($user_email) 
{
    global $db;
    $query = 'SELECT * FROM todos
              WHERE owneremail = :user_email';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_email", $user_email);
    $statement->execute();
    $email = $statement->fetchAll();
    $statement->closeCursor();
    return $email;
}

function delete_todos($product_id) {
    global $db;
    $query = 'DELETE FROM todos
              WHERE id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}
function add_item($owneremail,$ownerid,$createdate,$duedate,$mesage, $isdone ) {
    global $db;
    $query = 'INSERT INTO todos
                 (owneremail,ownerid,createddate,duedate,message,isdone)
              VALUES
                 (:owneremail, :ownerid, :createdate, :duedate, :message, :isdone)';
    $statement = $db->prepare($query);
    $statement->bindValue(':owneremail', $owneremail);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->bindValue(':createdate', $createdate);
    $statement->bindValue(':duedate', $duedate);
    $statement->bindValue(':message', $mesage);
    $statement->bindValue(':isdone', $isdone);
    $statement->execute();
    $statement->closeCursor();
    
}
function edit_item($id) {
    global $db;
    $isdone=1;
    $query = 'UPDATE todos                 
              SET isdone = :
                WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':isdone', $isdone);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
    
}
?>