<?php

$link = mysqli_connect("localhost", "srv22455_muzyka", "srv22455_muzyka", "srv22455_muzyka");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST["term"])){
    $sql = "SELECT performers.name, songs.src, songs.title, songs.img FROM details INNER JOIN performers on performers.id = details.idAuthor INNER JOIN songs ON songs.id = details.idSong where performers.name like ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        $param_term = '%' . $_REQUEST["term"] . '%';

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) > 0){
                $myArr = array();
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    array_push($myArr, $row["src"]);
                    array_push($myArr, $row["title"]);
                    array_push($myArr, $row["name"]);
                    array_push($myArr, $row["img"]);	

                }
                $myJSON = json_encode($myArr);
                echo $myJSON;
            } else{
                $myJSON = json_encode("0");
                echo $myJSON;
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    mysqli_stmt_close($stmt);
}
 
mysqli_close($link);
?>