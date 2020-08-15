 <?php include "templates/header.php"; ?>

<article>

<h3>ALL ADVISORS</h3>

<table>

<thead>

<tr>

<td>ID_number</td>
<td>Name</td>
<td>Dept</td>
<td>Num_Students</td>
<td></td>
<td></td>

</tr>
</thead>
<?php



// Enter username and password
$username = root;
$password = root;

// Create database connection using PHP Data Object (PDO)
$db = new PDO("mysql:host=localhost;dbname=techjobproject", $username, $password);

// Identify name of table within database
$table = 'advisors';

// Create the query
$stmt = $db->query('SELECT * from '.$table);

// Close connection to database
//$db = NULL;


// Print table rows
while($rows = $stmt->fetch()){
echo "<tr><td>". $rows['id_number'] . "</td><td>" . $rows['name'] . "</td>".
"<td>". $rows['dept'] . "</td><td>" . $rows['num_students'] . "</td>".
"<td>".'<a href="update_single.php">Edit</a>'. "</td>".
//<td><a href="update_single.php?id=<?php echo escape($row["student_id"]);
"<td>".'<a href="delete_single.php">Delete</a>'. "</td>".
//<td><a href="delete.php?id=<?php echo escape($row["student_id"]);
"</tr>";
};
?>

</table>


<br>
</article>


<?php include "templates/footer.php"; ?>
