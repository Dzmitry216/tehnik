<?php
$named = $_POST['name'];
$surnamed = $_POST['surname'];
$email = $_POST['mail'];
$date = $_POST['data'];


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

if ($result = mysqli_query($conn, "SELECT mail FROM userlog WHERE mail = '$email'")) {
  if (mysqli_num_rows($result) != 0) {
    echo"Такая почта уже существует";
     } else {
      $sql = "INSERT INTO userlog (name, surname, mail, data)
VALUES ('$named', '$surnamed', '$email', '$date')";
if (strlen($named) < 3 or strlen($surnamed)<3 or strlen($email)<3){
  echo "Некорректные данные(Имя, фамилия и почта не могут быть меньше трёх символов (наверное))";
}
else {

if ($conn->query($sql) === TRUE) {
  echo "Проверяй БД, я всё сохранил";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
} 
      
  }
}




$conn->close();
?>