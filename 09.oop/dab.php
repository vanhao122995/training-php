<?php
    require_once('./DB.php');
    $db = new DB();
    
    $where = array(
        ['id', '>', 444]
    );
    $data = $db->getAll(['id', 'name', 'status'], $where);
    echo '<pre>';
    print_r($data);
    echo '</pre>';die();