<?php

ini_set('display_errors', 'on');

require_once '../repositories/Department.php';

// Check label is exist
if (!empty($_POST["label"])) 
{
    Department::insert($_POST["label"], $_POST["region"], $_POST["departmentNumber"]);
}

header("Location: ../region.php?identifier=" . $_POST["region"]);
