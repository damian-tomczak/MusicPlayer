<?php

$link = mysqli_connect("localhost", "srv22455_muzyka", "srv22455_muzyka", "srv22455_muzyka");
 
if($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "SELECT * FROM songs;";

if($stmt = mysqli_prepare($link, $sql)) {

    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            echo "<meta charset='UTF-8'>";
            echo "<table>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>title</th>";
            echo "<th>duration</th>";
            echo "<th>src</th>";
            echo "<th>img</th>";
            echo "</tr>";
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["duration"] . "</td>";
                echo "<td>" . $row["src"] . "</td>";
                echo "<td>" . $row["img"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
    
mysqli_stmt_close($stmt);

mysqli_close($link);
?>