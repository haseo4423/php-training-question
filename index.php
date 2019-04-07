<html>
<head><title>PHP TEST</title></head>
<body>

<?php

function convert_enc($str)
{
    $from_enc = 'UTF-8';
    $to_enc = 'UTF-8';

    return mb_convert_encoding($str, $to_enc, $from_enc);
}


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