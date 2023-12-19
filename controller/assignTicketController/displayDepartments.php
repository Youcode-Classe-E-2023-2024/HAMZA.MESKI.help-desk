<?php
    require_once '../model/DepartementsDB.php';
    $departments = $departments_database->displayDepartments();

    foreach ($departments as $department) {
        echo '<label>';
        echo '<input type="checkbox" name="selected_departments[]" value="' . $department->departement . '">';
        echo $department->departement . '<br>';
        echo '</label>';
    }
?>
