<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP MySQL</title>
  <style>
    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>

<body>
  <p>
    <?php
    $connection = new mysqli("localhost:3306", "root", "khanh1992", "php_web");
    // connect_error is a properties of connection, it's null if there is no error
    if ($connection->connect_error != null) {
      echo "Failed to connect to MySQL: " . $connection->connect_error;
    } else { // If there is no error, process to seclec data

      // Check if there is get param to delete an user
      if ($_GET['delete_user']) {
        $user_id = $_GET['delete_user'];

        // Define query to delete data
        $sql = "DELETE FROM users WHERE id = '$user_id'";

        // use connection to execute the query to delete user
        if (!$connection->query($sql)) {
          // If deleting is failed, show error
          echo "<h3>Failed to delete data. Error:" . $connection->error . "</h3>";
        } else {
          // If deleted user successfully, show message and link to mysql_query.php to check the users list
          echo "<h3>Deleted user (id = $user_id) successfully</h3>";
        }
      }

      // Define a sql query
      $sql_query = "SELECT * FROM users";
      // Call method query of the object $connection to execute a query
      $result = $connection->query($sql_query);
    ?>
  </p>

  <h2>Users</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Fullname</th>
      <th>Username</th>
      <th>Email</th>
      <th>Action</th>
    </tr>

    <?php if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) { ?>
        <tr>
          <td><a href="./mysql_update.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
          <td><?php echo $row['fullname'] ?></td>
          <td><?php echo $row['username'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><a href="./mysql_query.php?delete_user=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <!-- end while -->
      <?php } ?>
      <!-- end if -->
    <?php } ?>
  </table>

  <!-- end of if for query -->
<?php } ?> 

</body>

</html>
