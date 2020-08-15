 <?php include "templates/header.php"; ?>



<section>
<article>
<h3 align="center">ALL COMPANIES</h3>

<table>

<thead>

<tr>

<td>company_name</td>
<td>address</td>
<td>zip</td>
<td>industry</td>
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
$table = 'companies';

// Create the query
$stmt = $db->query('SELECT * from '.$table);

// Close connection to database
//$db = NULL;


// Print table rows
while($rows = $stmt->fetch()){
echo "<tr><td>". $rows['company_name'] . "</td><td>" . $rows['address'] . "</td>".
"<td>". $rows['zip'] . "</td><td>" . $rows['industry'] . "</td>".
"<td>".'<a href="update_single.php">Edit</a>'. "</td>".
//<td><a href="update_single.php?id=<?php echo escape($row["student_id"]);
"<td>".'<a href="delete_single.php">Delete</a>'. "</td>".
//<td><a href="delete.php?id=<?php echo escape($row["student_id"]);
"</tr>";
};
?>

</table>


<br>

<?php
// add new student 
if (isset($_POST['submit'])) {}

$new_company = array(
  "company_name" => $_POST['company_name'],
  "address"  => $_POST['address'],
  "zip"     => $_POST['zip'],
  "industry"       => $_POST['industry'],
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "companies",
    implode(", ", array_keys($new_company)),
    ":" . implode(", :", array_keys($new_company))
);

$statement = $db->prepare($sql);
$statement->execute($new_company);

?>
</article>
<aside>

 <h3> ADD COMPANY PROFILE</h3>

<form method="post">
    	<label for="company_name">company_name</label>
    	<input type="text" name="company_name" id="company_name"><br>
    	<label for="address">address</label>
    	<input type="text" name="address" id="address"><br>
    	<label for="zip">zip</label>
    	<input type="text" name="zip" id="zip"><br>
    	<label for="industry">industry</label>
    	<input type="text" name="industry" id="industry">
    	<br>
    	<input type="submit" name="submit" value="Submit">
    </form>

   <br><br>




<a href="index.php">Back to home</a><br><br><br><br><br><br><br><br><br>

</aside>
</section>



<?php include "templates/footer.php"; ?>

