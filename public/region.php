<?php

ini_set('display_errors', 'on');
require_once dirname(__FILE__) . '/../repositories/Department.php';

$departments = \Entity\Department::getDepartmentsWithRegion($_GET["identifier"]);
?>
<a href= <?php echo "/country.php?identifier=" . $_GET["identifier"] ?>>Go Back</a>
<h1>Insert</h1>
<form action="./department-add.php" method="post">
    <input type="text" name="region" id="region" value=<?php echo $_GET["identifier"] ?> required>
    <label for="label">Enter your label department: </label>
    <input type="text" name="label" id="label" required autofocus>
    <label for="departmentNumber">Enter your department number: </label>
    <input type="text" name="departmentNumber" id="departmentNumber" required autofocus>
    <input type="submit" value="Insert!">
</form>
<table>
<?php
foreach ($departments as $department) {
    echo '<tr>';
    $department->view();
    echo '</tr>';
}
?>
</table>