<title> Singup Form </title>
	<link rel="stylesheet" href="../stylelogin.css">
</head>
<body>
	<h1> User Form </h1>
	<form>
		<div id="box"></div>
		<label class="font">First Name:      </label>
		<br>
		<input type="text" name="patient_name" value="<?php echo $name; ?>"  >
		<br>
		<br>
		<label>Last Name:       </label>
		<br>
		<input type="text" name="patient_name" id = "txt" value="<?php echo $lastname; ?>">
		<br>
		<br>
		<label>Item List:    </label>
 		<table border ='1' >
            <tr>
                <th> Message </th>
                <th> Isdone </th>
                 <th> Delete </th>
            </tr>
            <?php foreach ($list_todo as $product) : ?>
            <tr>
                <td><?php echo $product['message']; ?></td>
                <td>
                	<form action="." method="post">
                    <input type="hidden" name="action"
                           value="edit_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['id']; ?>">
                    <?php 
	                if ($product['isdone'] == '0'){
	                	echo '<input type="submit" value="Edit">';
	                }
	                else echo '<span>Completed</span>';
	                ?>
                </form>
            	</td>

				<td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>	
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add to-do-items</a>
        </p>
	</div>
	</form>
</body>
</html>