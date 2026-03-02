<?php
include "db.php";

if (isset($_GET['id_number'])) {
    $id_to_edit = $_GET['id_number'];
    
    $get = mysqli_query($conn, "SELECT * FROM student WHERE id_number = '$id_to_edit'");
    $client = mysqli_fetch_assoc($get);

    if (!$client) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
  $new_id = $_POST['id_number']; 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $course = $_POST['course'];

  $sql = "UPDATE student 
          SET id_number='$new_id', name='$name', email='$email', course='$course' 
          WHERE id_number='$id_to_edit'";
          
  if (mysqli_query($conn, $sql)) {
      header("Location: index.php");
      exit;
  } else {
      echo "Error updating record: " . mysqli_error($conn);
  }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8"><title>Edit Student Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Student Record</h2>
    
    <form method="post">
      <label>ID Number</label>
      <input type="text" name="id_number" value="<?php echo $client['id_number']; ?>" required>
    
      <label>Name</label>
      <input type="text" name="name" value="<?php echo $client['name']; ?>" required>
    
      <label>Email</label>
      <input type="text" name="email" value="<?php echo $client['email']; ?>" required>
    
      <label>Course</label>
      <input type="text" name="course" value="<?php echo $client['course']; ?>" required>
    
      <button type="submit" name="update">Save to do</button>
    </form>
  </div>
</body>
</html>


