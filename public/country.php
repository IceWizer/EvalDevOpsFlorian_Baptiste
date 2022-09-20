<?php

ini_set('display_errors', 'on');
require_once dirname(__FILE__) . '/../repositories/Region.php';

$regions = Region::getRegions();
?>

<h1>Insert</h1>
<form action="./region-add.php" method="post">
    <input type="text" name="country" id="country" value=<?php echo $_GET["identifier"] ?> required>
    <label for="label">Enter your label Region: </label>
    <input type="text" name="label" id="label" required autofocus>
    <input type="submit" value="Insert!">
</form>
<table>
    <?php
    foreach ($regions as $region) {
        echo '<tr>';
        $region->view();
        echo '</tr>';
    }
    ?>
</table>