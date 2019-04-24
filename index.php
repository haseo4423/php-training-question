<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
    <head>
        <title>会員限定ページ</title>
        <link rel="stylesheet" href="/SlickGrid/slick.grid.css" type="text/css"/>
        <link rel="stylesheet" href="/SlickGrid/css/smoothness/jquery-ui-1.11.3.custom.css" type="text/css"/>
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

?>

    <table width="100%">
        <tr>
            <div id="myGrid" style="width:100%;height:700px;"></div>
        </tr>
    </table>

    <script src="/SlickGrid/lib/jquery-1.11.2.min.js"></script>
    <script src="/SlickGrid/lib/jquery.event.drag-2.3.0.js"></script>

    <script src="/SlickGrid/slick.core.js"></script>
    <script src="/SlickGrid/slick.grid.js"></script>

<?php

try {
    $dbh = new PDO($dsn, $user, $password);
    $sql = 'select * from pokemon_status';
    $array = array();
    foreach ($dbh->query($sql) as $row) {
        $array[] = array(
            'dict_num' => $row['dict_num'],
            'name' => $row['name'],
            'type1' => $row['type1'],
            'type2' => $row['type2'],
            'detail' => '詳細');
    }
} catch (PDOException $e) {
    print('Error:'.$e->getMessage());
    die();
}

// ポケモンリストをJSON形式に変換
$json_list = json_encode($array, JSON_UNESCAPED_UNICODE);

$dbh = null;

?>

    <script>
    var grid;
    var columns = [
        {id: "dict_num", name: "図鑑番号", field: "dict_num"},
        {id: "name", name: "名前", field: "name"},
        {id: "type1", name: "タイプ1", field: "type1"},
        {id: "type2", name: "タイプ2", field: "type2"},
        {id: "detail", name: "操作", field: "detail",
            formatter: linkFormatter = function ( row, cell, value, columnDef, dataContext ) {
                return '<a href="/detail.php?dict_num=' + dataContext['dict_num'] + '">' + dataContext['detail'] + '</a>';
            }
        }
    ];

    var options = {
        // 表のサイズをウィンドウ領域に合わせる
        forceFitColumns: true,
        enableCellNavigation: true,
        enableColumnReorder: false
    };

    $(function () {
        let pokemon_list = <?php echo $json_list; ?>

        grid = new Slick.Grid("#myGrid", pokemon_list, columns, options);
    })
    </script>

    </body>
</html>