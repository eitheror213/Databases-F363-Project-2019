<html>

<table>

<tr>

<td>studentID</td>
<td>name</td>
<td>year</td>
<td>advisor</td>

</tr>
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
$db = NULL;


// Print table rows
while($rows = $stmt->fetch()){
echo "<tr><td>". $rows['studentID'] . "</td><td>" . $rows['name'] . "</td>".
"<td>". $rows['year'] . "</td><td>" . $rows['advisor'] . "</td></tr>";
};
?>
</table>
</html>