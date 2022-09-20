<?php

ini_set('display_errors', 'on');
require_once dirname(__FILE__) . '/../repositories/Country.php';

$countries = \Entity\Country::getCountries();
?>

<h1>Insert</h1>
<form action="./country-add.php" method="post">
    <label for="label">Enter your label Country: </label>
    <input type="text" name="label" id="label" required autofocus>
    <input type="submit" value="Insert!">
</form>
<table>
    <?php
    foreach ($countries as $country) {
        echo '<tr>';
        $country->view();
        echo '</tr>';
    }
    ?>
</table>