<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "to_do";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = array('error'=>false);
$action = '';

if (isset($_GET['action'])) {
   $action = $_GET['action'];
}


if ($action == 'read') {
  $sql = $conn->query("SELECT * FROM list");
  $list = array();

    while($row = $sql->fetch_assoc()) {
      array_push($list, $row);
    }
    $result['list'] = $list;
}

if ($action == 'create') {
  $todo =$_POST['todo'];
  $due_date =$_POST['due_date'];
  $done =$_POST['done'];
  $trash =$_POST['trash'];
  $sql = $conn->query("INSERT INTO list(todo,due_date,done,trash)VALUES('$todo','$due_date','$done','$trash')");
    if ($sql) {
    $result['message'] ="Item has been added";
  }else {
    $result['error'] = true;
    $result['message'] ="Failed to add item";
  }
}


if ($action == 'update') {
  $id= $_POST['id'];
  $todo =$_POST['todo'];
  $due_date =$_POST['due_date'];
  $done =$_POST['done'];
  $trash =$_POST['trash'];
  $sql = $conn->query("UPDATE list SET todo ='$todo', due_date='$due_date', done ='$done' trash ='$trash' WHERE id = '$id'");
    if ($sql) {
    $result['message'] ="Item has been updated";
  }else {
    $result['error'] = true;
    $result['message'] ="Failed to update item";
  }
}

if ($action == 'delete') {
  $id= $_POST['id'];
  $sql = $conn->query("DELETE FROM list WHERE id = $id");
    if ($sql) {
    $result['message'] ="Item has been removed";
  }else {
    $result['error'] = true;
    $result['message'] ="Failed to remove item";
  }
}
echo json_encode($result);
?>
