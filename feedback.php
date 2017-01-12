<?php
include 'dbconnect.php';    // $db -> connection name
$sql = "SELECT * FROM contactus";
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAD///8AAABkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEREREREREREQAAABAAAAAREQARERAAERERABERAAEREREAERAAEREREQARAAERERERABAAEREREREAAAEREREREQAAERERERERABABEREREREAEQAREREREQAREAERERERABERABEREREAEREQARERAAAAEAAAAREREREREREREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />
    </head>>
<body>
<?php
while($row = $result->fetch_assoc()) {
    $txt = "User Query:";
    echo $txt;
    echo '<p>Name: '.$row['name'].'</p>';
    echo '<p>Email: '.$row['email'].'</p>';
    echo '<p>Message: '.$row['message'].'</p>';
    echo '<hr>';
}

?>
</body>
</html>