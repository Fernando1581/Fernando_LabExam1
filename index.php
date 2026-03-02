<?php
include "db.php";
$records = mysqli_query($conn, "SELECT * FROM student");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8"><title>Student Record</title>
</head>
<body>
 
<div class="add_p">
    <h2>Student Records</h2>
    <p><a href="student_add.php">+ Add Student</a></p>
</div>

<table>
  <tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Action</th>
  </tr>
  <?php while($row = mysqli_fetch_assoc($records)) { ?>
    <tr>
      <td><?php echo $row['id_number']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['course']; ?></td>
      <td>
        <a href="student_edit.php?id=<?php echo $row['id_number']; ?>">Edit</a>
        <p>Delete</p>
      </td>
    </tr>
  <?php } ?>
</table>
<button onclick="window.location.href='login.php'">Logout</button>
</body>
</html>