<?php

require_once __DIR__ . '/functions.php';
require_once(dirname(__FILE__).'/common/db_access.php');
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
    <head>
        <title>編集ページ</title>
        <style>
            table {
                border: solid 2px black;
                border-collapse: collapse;
            }
            table th {
                background: #f5f5de;
                border: solid 2px black;
            }
            table td {
                border: solid 1px black;
            }
        </style>
    </head>
    <body>

<?php

if(isset($_GET['dict_num'])) {
    $dict_num = $_GET['dict_num'];
}

// DB接続クラスの生成
$obj = new DbAccess();

$list_data = $obj->select_by_dict_num($dict_num);

print('<form action="update.php" method="post">');
print('<table>');

foreach ($list_data as $row) {
    print('<tr>'
            .'<th>図鑑番号</th>'
            .'<td>'.$row['dict_num'].'</td>'
        .'</tr>');
    print('<tr>'
            .'<th>名前</th>'
            .'<td><input type="text" maxlength="30" name="name" value="'.$row['name'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>タイプ1</th>'
            .'<td><input type="text" maxlength="10" name="type1" value="'.$row['type1'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>タイプ2</th>'
            .'<td><input type="text" maxlength="10" name="type2" value="'.$row['type2'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>特性1</th>'
            .'<td><input type="text" maxlength="30" name="chara1" value="'.$row['chara1'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>特性2</th>'
            .'<td><input type="text" maxlength="30" name="chara2" value="'.$row['chara2'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>夢特性</th>'
            .'<td><input type="text" maxlength="30" name="chara_sp" value="'.$row['chara_sp'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>HP</th>'
            .'<td><input type="text" maxlength="3" name="status_hp" value="'.$row['status_hp'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>こうげき</th>'
            .'<td><input type="text" maxlength="3" name="status_attack" value="'.$row['status_attack'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>ぼうぎょ</th>'
            .'<td><input type="text" maxlength="3" name="status_defense" value="'.$row['status_defense'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>とくこう</th>'
            .'<td><input type="text" maxlength="3" name="status_spattack" value="'.$row['status_spattack'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>とくぼう</th>'
            .'<td><input type="text" maxlength="3" name="status_spdefense" value="'.$row['status_spdefense'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>すばやさ</th>'
            .'<td><input type="text" maxlength="3" name="status_speed" value="'.$row['status_speed'].'"></td>'
        .'</tr>');
    print('<tr>'
            .'<th>合計</th>'
            .'<td><input type="text" maxlength="3" name="status_sum" value="'.$row['status_sum'].'"></td>'
        .'</tr>');
}

print('</table>');
print('<input type="hidden" name="dict_num" value="'.$row['dict_num'].'">');
print('<input type="submit" value="更新">');
print('</form>');

?>

    </body>
</html>