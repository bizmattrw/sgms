<?php
function fetchNow($db,$column,$tableName,$condition)
{
$sel=mysqli_query($db,"SELECT $column FROM $tableName WHERE $condition");
}
?>