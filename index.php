<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
<title>会員限定ページ</title>
<h1>ようこそ,<?=h($_SESSION['username'])?>さん</h1>
<a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a>

<html>
<head><title>PHP TEST</title></head>
<body>

<?php

$dsn = 'pgsql:dbname=php_training_database host=172.20.0.35 port=5432';
$user = 'php_training_user';
$password = '7890';

try {
    $dbh = new PDO($dsn, $user, $password);

    print('接続に成功しました。<br>');

    $sql = 'select * from pokemon_status';
    foreach ($dbh->query($sql) as $row) {
        print(convert_enc($row['id']));
        print(convert_enc($row['name']).'<br>');
    }
} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
    die();
}


$dbh = null;

?>

</body>
</html>