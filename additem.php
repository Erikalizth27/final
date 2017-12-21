<!DOCTYPE html>
<html>

<link rel="stylesheet" href="../stylelogin.css">
<?php include '../view/footer.php'; ?>
<?php include '../view/header.php'; ?>
<main>
    <h1>Add To-do Item</h1>
    <form action="" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_item">

        <label>Message:</label>
        <input type="text" name="message" />
        <br><br>

        <label>Isdone:</label>
        <select name="isdone" style="font-size: 14">
            <option value="1"  >Complete </option>
            <option value ="0" > Incomplete </option>
        </select>
        <br><br>
        <label>Due Date (y-m-d):</label>
        <input type="text" name="due_date" />
        <br><br>
        <label>&nbsp;</label>
        <input type="submit" value ="add_item"  />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="../login.php">Main Page</a>
        
    </p>
</main>
<?php include '../view/footer.php'; ?>
</html>