<?php

require_once __DIR__ . '/functions.php';
require_logined_session();
/**
 * ここをこうする
 */
header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
    <head>
        <title>会員限定ページ</title>
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
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from pokemon_status';
    foreach ($dbh->query($sql) as $row) {
        print($row['dict_num']);
        print($row['name']);
        print($row['type1']);
        print($row['type2'].'<br>');
    }
} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
    die();
}


$dbh = null;

?>

    </body>
</html>