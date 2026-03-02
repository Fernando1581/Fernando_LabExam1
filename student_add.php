<?php
include "db.php";
 
if (isset($_POST['save'])) {
  $id_number = $_POST['id_number'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $course = $_POST['course'];
 
  $sql = "INSERT INTO student (id_number, name, email, course)
        VALUES ('$id_number', '$name', '$email', '$course')";
  mysqli_query($conn, $sql);
  header("Location: index.php");
  exit;

}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8"><title>Creating Student Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Create Student Record</h2>
      
    <form method="post">
      <label>ID Number</label>
      <input type="text" name="id_number" required>
      
      <label>Name</label>
      <input type="text" name="name" required>
      
      <label>Email</label>
      <input type="text" name="email" required>
      
      <label>Course</label>
      <input type="text" name="course" required>
      
      <button type="submit" name="save">Save</button>
    </form>
  </div>

</body>
</html>