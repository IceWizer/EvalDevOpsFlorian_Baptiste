<?php

ini_set('display_errors', 'on');

require_once '../repositories/Country.php';

// Check label is exist
if (!empty($_POST["label"])) {
    \Entity\Country::insert($_POST["label"]);
}

header("Location: ../");
