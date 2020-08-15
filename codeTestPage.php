 <?php include "templates/header.php"; ?>

<article>

<h3>ALL STUDENTS</h3>

<table>

<thead>

<tr>

<td>studentID</td>
<td>name</td>
<td>year</td>
<td>advisor</td>
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
$table = 'students';

// Create the query
$stmt = $db->query('SELECT * from '.$table);

// Close connection to database
//$db = NULL;


// Print table rows
while($rows = $stmt->fetch()){
echo "<tr><td>". $rows['studentID'] . "</td><td>" . $rows['name'] . "</td>".
"<td>". $rows['year'] . "</td><td>" . $rows['advisor'] . "</td>".
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
<aside>
<?php
// add new student 
if (isset($_POST['submit'])) {}

$new_student = array(
  "studentID" => $_POST['studentID'],
  "name"  => $_POST['name'],
  "year"     => $_POST['year'],
  "advisor"       => $_POST['advisor'],
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "students",
    implode(", ", array_keys($new_student)),
    ":" . implode(", :", array_keys($new_student))
);

$statement = $db->prepare($sql);
$statement->execute($new_student);

?>
 <h3> ADD STUDENT</h3>

<form method="post">
    	<label for="studentID">studentID</label>
    	<input type="text" name="studentID" id="studentID"><br>
    	<label for="name">name</label>
    	<input type="text" name="name" id="name"><br>
    	<label for="year">year</label>
    	<input type="text" name="year" id="year"><br>
    	<label for="advisor">advisor</label>
    	<input type="text" name="advisor" id="advisor"><br>
    	<br>
    	<input type="submit" name="submit" value="Submit">
    </form>

   <br>




<a href="index.php">Back to home</a>
</aside>

<?php include "templates/footer.php"; ?>
