<?php
//---------------------PERSON TABLE----------------------------------
//function to create a user
function createUser($email,$pass){
// query: insert data
$query = "INSERT INTO Person VALUES (NULL, '$email', '$pass');";
execute_query($query);
}

//function to get userID from user email
function getUserID($email){
// query: retrieve data
$query = "select PID from Person where Email = '$email';";
$rset = execute_query($query); // rset has array of records.
// manipulate retrieved data
while ($row = mysql_fetch_assoc($rset)) {
$id = $row['PID'];
echo nl2br($id ."\n");
return $id;
}
}
//---------------------PERSON TABLE----------------------------------
//---------------------FOR MOBILE APP--------------------------------
//function to get what lichens the user has visited based on user email
function listLichensOnEmail($email){
// query: retrieve data
$query = "select SubLoc.MID, group_concat(Visited.SID) as visitedSub from Visited, SubLoc, Person where Visited.PID = Person.PID and Visited.SID = SubLoc.SID and Email = '$email' group by MID;";
$rset = execute_query($query); // rset has array of records.
// manipulate retrieved data
while ($row = mysql_fetch_assoc($rset)) {
/*
$mid = $row['MID'];
$sids = $row['group_concat(Visited.SID)'];
echo nl2br("Main: ".$mid ." Sub: ".$sids ."\n");
*/
$resp[] = $row;
}
echo json_encode($resp);
}
//---------------------FOR MOBILE APP--------------------------------
//---------------------VISITED TABLE---------------------------------
//function to create a check-in
function createCheckin($SID,$PID,$TIME){
// query: insert data
$query = "INSERT INTO Visited VALUES ($SID,$PID, '$TIME');";
execute_query($query);
}

//function to get all visitors for all locations (FOR GOOGLE ANALYTICS)
function getVisitorsForEachSub(){
// query: retrieve data
$query = "select SID, group_concat(PID,':',Time) as Visitors from Visited group by SID;";
$rset = execute_query($query); // rset has array of records.
// manipulate retrieved data
while ($row = mysql_fetch_assoc($rset)) {
$resp[] = $row;
}
echo json_encode($resp);
}
//---------------------VISITED TABLE---------------------------------
//---------------------MAINLOC TABLE---------------------------------
//function to read main locs
function getMainLocs(){
// query: retrieve data
$query = "select * from MainLoc;";
$rset = execute_query($query); // rset has array of records.
// manipulate retrieved data
while ($row = mysql_fetch_assoc($rset)) {
$resp[] = $row;
}
echo json_encode($resp);
}
//function to create a main location
//function to get all visitors for all locations (FOR GOOGLE ANALYTICS)
function getVisitorsForEachMain(){
// query: retrieve data
$query = "select SubLoc.MID, group_concat(T.SID,':', T.Visitors separator '|') as Lichens_Visitors from SubLoc,(select SID, group_concat(PID,'_',Time) as Visitors from Visited group by SID) as T where SubLoc.SID = T.SID group by MID;";
$rset = execute_query($query); // rset has array of records.
// manipulate retrieved data
while ($row = mysql_fetch_assoc($rset)) {
$resp[] = $row;
}
echo json_encode($resp);
}

//---------------------MAINLOC TABLE---------------------------------

// include execute_query function
require 'util.php';
// connect MySQl and DB
require 'dbConn.php';

            createUser("asdf","asdfasdf");
//createUser("test@gmail.com","123456");
/*getUserID("test@yahoo.com");
//createCheckin(2,1,'2015-02-20 04:01:00');
listLichensOnEmail("test@yahoo.com");
getVisitorsForEachSub();
getVisitorsForEachMain();
getMainLocs();
*/
// close connection
//mysql_close();
?>