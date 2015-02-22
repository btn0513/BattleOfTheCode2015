<?php






if($_POST["table"]=="person"){
    if($_POST["crud"]=="create"){
        createUser($_POST["email"],$_POST["pass"]);
    }else if($_POST["crud"]=="read"){
        readUser($_POST["email"]);
    }
    createUser($_POST["email"],$_POST["pass"]);
}else if($_POST["table"]=="mainlocation"){
    createLocation($_POST["email"],$_POST["pass"]);
}













function readUsers($full=0){
    $sql = "SELECT ";
    $sql .= ($full) ? "* " : "NameID, FBUID, Name ";
    $sql .="FROM ambassadors";
    $users = DBQuery($sql);
    while($row = mysqli_fetch_assoc($users)){
        $resp[] = $row;
    }
    return _json($resp);
}
function createUser($email, $pass){
    $sql = "SELECT ";
    $sql .= ($full) ? "* " : "NameID, FBUID, Name ";
    $sql .="FROM ambassadors";
    $users = DBQuery($sql);
    while($row = mysqli_fetch_assoc($users)){
        $resp[] = $row;
    }
    return _json($resp);
    $sql="INSERT INTO person (NameID, FBUID, Name) ".
            "VALUES ('')";
    // Execute query
    DBQuery($sql);
}








function DBQuery($sql){
    // Create connection
    $con = mysqli_connect("servername",
        "username","password");
    // Check connection
    if (mysqli_connect_errno()){
        $resp = NULL;
        echo "Failed to connect to MySQL: ";// . mysqli_connect_error();
    }else{
        $resp = mysqli_query($con,$sql);
    }
    mysqli_close($con);
    return $resp;
}
?>