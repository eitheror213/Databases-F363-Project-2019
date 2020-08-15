<?php include "templates/header.php"; ?>

<article>

<h3>Job Application Records</h3>

<table>

<thead>

<tr>

<td>application no.</td>
<td>student_id</td>
<td>job_title</td>
<td>company</td>
<td>salary</td>
<td>dept contact</td>
<td>applied_on</td>
<td>followed_up_on</td>
<td>offered_interview</td>
<td>offered_job</td>

</tr>
</thead>
<?php

// Enter username and password
$username = root;
$password = root;

// Create database connection using PHP Data Object (PDO)
$db = new PDO("mysql:host=localhost;dbname=techjobproject", $username, $password);

// Identify name of table within database
$table = 'application_records';

// Create the query
$stmt = $db->query('SELECT * from '.$table);

// Close connection to database
//$db = NULL;


// Print table rows
while($rows = $stmt->fetch()){
echo "<tr><td>". $rows['application_number'] . "</td><td>" . $rows['student_id'] . "</td>".
"<td>". $rows['job_title'] . "</td><td>" . $rows['company'] . "</td>"."</td><td>" . $rows['salary'] . "</td>".
"</td><td>" . $rows['dept_contact'] . "</td>"."</td><td>" . $rows['applied_on'] . "</td>".
"</td><td>" . $rows['followed_up_on'] . "</td>"."</td><td>" . $rows['offered_interview'] . "</td>".
"</td><td>" . $rows['offered_job'] . "</td>".
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

$new_application = array(
  "application_number" => $_POST['application_number'],
  "student_id"  => $_POST['student_id'],
  "job_title"     => $_POST['job_title'],
  "company"       => $_POST['company'],
  "salary" => $_POST['salary'],
  "dept_contact"  => $_POST['dept_contact'],
  "applied_on"     => $_POST['applied_on'],
  "followed_up_on"       => $_POST['followed_up_on'],
  "offered_interview" => $_POST['offered_interview'],
  "offered_job"  => $_POST['offered_job'],
 
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "application_records",
    implode(", ", array_keys($new_application)),
    ":" . implode(", :", array_keys($new_application))
);

$statement = $db->prepare($sql);
$statement->execute($new_application);

?>
 <h3> Add New Application Record</h3>

<form method="post">
<div style="float left;">
    	<label for="application_number">Application Number:</label>
    	<input type="text" name="application_number" id="application_number">

    	<label for="student_id">Student ID:</label>
    	<input type="text" name="student_id" id="student_id">

    	<label for="job_title">Job Title:</label>
    	<input type="text" name="job_title" id="job_title">

    	<label for="company">Company:</label>
    	<input type="text" name="company" id="company">

    	<label for="salary">Salary:</label>
    	<input type="text" name="salary" id="salary">
</div>
<div style="float right;">

    	<label for="dept_contact">Dept Contact:</label>
    	<input type="text" name="dept_contact" id="dept_contact">


    	<label for="applied_on">Applied On:</label>
    	<input type="text" name="applied_on" id="applied_on">

    	<label for="followed_up_on">Follwed Up On:</label>
    	<input type="text" name="followed_up_on" id="followed_up_on">

    	<label for="offered_interview">Offered Interview:</label>
    	<input type="text" name="offered_interview" id="offered_interview"><br>

    	<label for="offered_job">Offered Job:</label>
    	<input type="text" name="offered_job" id="offered_job">
</div>

    	<br>
    	<input type="submit" name="submit" value="Submit">
    </form>

   <br>




<a href="index.php">Back to home</a>
</aside>

<?php include "templates/footer.php"; ?>

