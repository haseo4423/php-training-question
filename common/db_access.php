<?php

require_once(dirname(__FILE__).'/../conf/db_info.php');

class DbAccess {

    /*
    * DB接続し、pdoデータを取得
    */
    private function pdo() {

        try {
            $pdo = new PDO(DSN, DB_USER, DB_PWD);

        } catch (PDOException $e) {
            print('Error:'.$e->getMessage());
            die();
        }
        
        return $pdo;
    }

    /*
    * 全ポケモンデータを取得するメソッド
    */
    public function select_all(){

        $sql = 'select * from pokemon_status';

        $stmt = $this -> pdo() -> query($sql);
        $list=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    /*
    * 特定のポケモンデータを取得するメソッド
    */
    public function select_by_dict_num($dict_num){

        $sql = "select * from pokemon_status where dict_num='".$dict_num."'";

        $stmt = $this -> pdo() -> query($sql);
        $list=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}

?>