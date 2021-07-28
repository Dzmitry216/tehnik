<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<body>
<form action="post.php" method="post">
    <div class="container px-4">
        <div class="row gx-5"> 
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Имя" aria-label="Имя" aria-describedby="basic-addon1">
                <input type="text" name="surname" class="form-control" placeholder="Фамилия" aria-label="Server">
             </div>
        </div>
      <div class="input-group mb-3">
        <input type="text" name="mail" class="form-control" placeholder="Почта" aria-label="Почта" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text">Личные данные</span>
        <textarea name="data" class="form-control" aria-label="With textarea"></textarea>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
       <input class="btn btn-primary" type="submit">
      </div>
    </div>
</form>
<form action="post.php" method="post">
<?php
$servername = "localhost:3307";
$username = "123";
$password = "123";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, surname, mail, data FROM userlog";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Имя: " . $row["name"]. " Фамилия: " . $row["surname"]. " Почта: " . $row["mail"]. "@gmail.com". " Данные: " . $row["data"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>