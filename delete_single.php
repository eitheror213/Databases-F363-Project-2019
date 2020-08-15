<?php

/**
  * Delete a student based on student_id number.
  */

if (isset($_GET["id"])) {
  try {
    $db = new PDO("mysql:host=localhost;dbname=techjobproject", $username, $password);

    $student_id = $_GET["student_id"];

    $sql = "DELETE FROM users WHERE student_id = :student_id";

    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "student successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $db = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $db->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<h2>Delete students</h2>

<?php if ($success) echo $success; ?>

<table>
<thead>
</thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["student_id"]); ?></td>
      <td><?php echo escape($row["name"]); ?></td>
      <td><?php echo escape($row["year"]); ?></td>
      <td><?php echo escape($row["advisor"]); ?></td>
      <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>