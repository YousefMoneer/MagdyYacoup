<!DOCTYPE html>
<html>
<head>
  <title>Query Page</title>
  <link rel="icon" href="./css/images/logo-ar-removebg-preview.png">
  <link rel="stylesheet" type="text/css" href="./css/check.css">
</head>
<body>
  <div class="container">
    <h1>Query Page</h1>
    <form method="POST" action="./check.php">
      <label for="phone">ادخل رقم هاتفك للاستعلام</label>
      <input type="text" name="phone" id="phone">
      <button type="submit" name="submit">Search</button>
    </form>
    <div class="table-container">
    <?php
include "./db_conn.php";
  if (isset($_POST["submit"])) {
    $phone = $_POST["phone"];

    $sql = "SELECT * FROM appointments WHERE phone = '$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Doctor</th>
      <th>Service</th>
      <th>Date</th>
      <th>Time</th>
      <th>Notice</th>
      <th>Created At</th>
      </tr>";
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]
        ."</td><td>".$row["name"].
        "</td><td>".$row["email"].
        "</td><td>".$row["phone"].
        "</td><td>".$row["doctor"].
        "</td><td>".$row["service"].
        "</td><td>".$row["date"].
        "</td><td>".$row["time"].
        "</td><td>".$row["notice"].
        "</td><td>".$row["created_at"]."</td></tr>";
    }
    echo "</table>";
    } else {
    echo "<p>No results found.</p>";
    }
    $conn->close();
}
?>
    </div>
  </div>


</body>
</html>
