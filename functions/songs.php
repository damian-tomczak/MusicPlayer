<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "srv22455_muzyka", "srv22455_muzyka", "srv22455_muzyka");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT performers.name, songs.src, songs.title FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong where performers.name like ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                $myArr = array();
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    array_push($myArr, $row["src"]);
                    array_push($myArr, $row["title"]);
                    array_push($myArr, $row["name"]);	

                }
                $myJSON = json_encode($myArr);
                echo $myJSON;
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>