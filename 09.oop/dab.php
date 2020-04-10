<?php
    require_once('./DB.php');
    $db = new DB();

    $params = [];
    //$params['select'] = ['id', 'name', 'status'];
    // $params['where'] = [
    //     ['id', '=', 444],
    // ];
    //$params['limit'] = [0, 10]; //LIMIT 0, 10

    //$data = $db->getAll();
    //$db->delete([222263, 222262]);
    $where = [
        ['id', '=', 444],
        ['name', '=', 'ti'],
    ];
    $db->isExistRecord($where);

