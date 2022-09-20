<?php

ini_set('display_errors', 'on');

require_once '../repositories/Region.php';

// Check label is exist
if (!empty($_POST["label"])) {
    Region::insert($_POST["label"], $_POST["country"]);
}

header("Location: ../country.php?identifier=" . $_POST["country"]);
