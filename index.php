<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
    <head>
        <title>会員限定ページ</title>
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
        <h1>
            ようこそ,<?=h($_SESSION['username'])?>さん
            <span style="font-size: small;">
                <a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a>
            </span>
        </h1>

<?php

$dsn = 'pgsql:dbname=php_training_database host=172.20.0.35 port=5432';
$user = 'php_training_user';
$password = '7890';

try {
    print('<table>');
    print('<tr>');
    print('<th>図鑑番号</th><th>名前</th><th>タイプ1</th><th>タイプ2</th><th>操作</th>');
    print('</tr>');
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from pokemon_status';
    foreach ($dbh->query($sql) as $row) {
        print('<tr>');
        print('<td>'.$row['dict_num'].'</td>');
        print('<td>'.$row['name'].'</td>');
        print('<td>'.$row['type1'].'</td>');
        print('<td>'.$row['type2'].'</td>');
        print('<td><a href="/detail.php?dict_num='.$row['dict_num'].'">詳細</a></td>');
        print('</tr>');
    }
    print('</table>');
} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
    die();
}


$dbh = null;

?>

    </body>
</html>