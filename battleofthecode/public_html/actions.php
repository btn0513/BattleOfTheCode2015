<?php
require 'dbcommands.php';

if($_POST["table"]="person"){
    if($_POST["crud"]="create"){
        if( getUserID($_POST["email"])!="" ){
            createUser($_POST["email"],$_POST["password"]);
        }
    }else if($_POST["crud"]="read"){
        createUser($_POST["email"],$_POST["pass"]);
    }
}
header('Location: http://http://23.254.128.69/urban/#map?name='.$_POST["email"]);
