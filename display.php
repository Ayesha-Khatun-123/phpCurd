<?php 
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM FORM";

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total > 0) {
    $result = mysqli_fetch_assoc($data);
    echo $result['fname'] . " " . $result['lname']." ".$result['gender'];
} else {
    echo "No records found.";
}
?>
