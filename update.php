<?php

require_once __DIR__ . '/common/db_access.php';
require_once __DIR__ . '/functions.php';
require_logined_session();

$pokemon_data = array( 
    'dict_num' => $_POST['dict_num'],
    'name' => $_POST['name'],
    'type1' => $_POST['type1'],
    'type2' => $_POST['type2'],
    'chara1' => $_POST['chara1'],
    'chara2' => $_POST['chara2'],
    'chara_sp' => $_POST['chara_sp'],
    'status_hp' => $_POST['status_hp'],
    'status_attack' => $_POST['status_attack'],
    'status_defense' => $_POST['status_defense'],
    'status_spattack' => $_POST['status_spattack'],
    'status_spdefense' => $_POST['status_spdefense'],
    'status_speed' => $_POST['status_speed'],
    'status_sum' => $_POST['status_sum']
);

// DB接続クラスの生成
$obj = new DbAccess();

$list_data = $obj->update($pokemon_data);

// 更新完了後に /datail.php に遷移
header("Location: /detail.php?dict_num=".$_POST['dict_num']."");