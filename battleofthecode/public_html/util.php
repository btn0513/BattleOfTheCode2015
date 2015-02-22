<?php
function execute_query($query) {
$rset = mysql_query($query);
if (!$rset) {
echo nl2br("Query failed: $query\n");
trigger_error(mysql_error());
} else {
echo nl2br("$query\n");
}
return $rset;
}
?>