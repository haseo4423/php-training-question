<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
    <head>
        <title>会員限定詳細ページ</title>
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

$dsn = 'pgsql:dbname=php_training_database host=172.20.0.35 port=5432';
$user = 'php_training_user';
$password = '7890';

if(isset($_GET['dict_num'])) {
    $dict_num = $_GET['dict_num'];
}

try {
    print('<table>');

    $dbh = new PDO($dsn, $user, $password);
    $sql = "select * from pokemon_status where dict_num='".$dict_num."'";
    foreach ($dbh->query($sql) as $row) {
        print('<tr>'
                .'<th>図鑑番号</th>'
                .'<td>'.$row['dict_num'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>名前</th>'
                .'<td>'.$row['name'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>タイプ1</th>'
                .'<td>'.$row['type1'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>タイプ2</th>'
                .'<td>'.$row['type2'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>特性1</th>'
                .'<td>'.$row['chara1'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>特性2</th>'
                .'<td>'.$row['chara2'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>夢特性</th>'
                .'<td>'.$row['chara_sp'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>HP</th>'
                .'<td>'.$row['status_hp'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>こうげき</th>'
                .'<td>'.$row['status_attack'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>ぼうぎょ</th>'
                .'<td>'.$row['status_defense'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>とくこう</th>'
                .'<td>'.$row['status_spattack'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>とくぼう</th>'
                .'<td>'.$row['status_spdefense'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>すばやさ</th>'
                .'<td>'.$row['status_speed'].'</td>'
            .'</tr>');
        print('<tr>'
                .'<th>合計</th>'
                .'<td>'.$row['status_sum'].'</td>'
            .'</tr>');
    }

    print('</table>');
    print('<a href="/">戻る</a>');

} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
    die();
}


$dbh = null;

?>

    </body>
</html>