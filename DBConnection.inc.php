<?php
function GetDBConnection()
{
    return mysqli_connect("localhost", "nani", "nani", "wolfenstein");
}