<?php
function GetDBConnection()
{
    return mysqli_connect("localhost", "root", "123", "scrumoppgave");
}
