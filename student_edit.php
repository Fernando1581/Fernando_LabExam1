<?php
include "db.php";

$id_number = $_GET['id_number'] ?? null;

if ($id_number === null) {
    die("No student selected.");
}

$get = mysqli_query($conn, "SELECT * FROM student WHERE id_number = '$id_number'");
$client = mysqli_fetch_assoc($get);

if (!$client) {
    die("Student not found.");
}

if (isset($_POST['update'])) {

    $original_id = $_POST['original_id']; // old id
    $id_number = $_POST['id_number'];     // new id
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE student
            SET id_number='$id_number',
                name='$name',
                email='$email',
                course='$course'
            WHERE id_number='$original_id'";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8"><title>Edit Student Record</title>
</head>
<body>

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

</body>
</html>


