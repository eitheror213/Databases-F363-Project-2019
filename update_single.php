<?php
/**
  *HTML form to edit an entry in the students table.
  *
  */
if (isset($_POST['submit'])) {
  try {
$db = new PDO("mysql:host=localhost;dbname=techjobproject", $username, $password);
    $user =[
      "student_id"=> $_POST['student_id'],
      "name"      => $_POST['name'],
      "year"      => $_POST['year'],
      "advisor"   => $_POST['advisor'],
      
    ];

    $sql = "UPDATE students
            SET
              student_id = :student_id,
              name = :name,
              year = :year,
              advisor = :advisor,
            WHERE id = :id";

  $statement = $db->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['student_id'])) {
  try {
    $id = $_GET['student_id'];
    $sql = "SELECT * FROM students WHERE student_id = :id";
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Error!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo escape($_POST['name']); ?> successfully updated.
<?php endif; ?>

<h2>Edit a user</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>