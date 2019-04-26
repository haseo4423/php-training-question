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

        $sql = 'select * from pokemon_status order by id';

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

    /*
    * 特定のポケモンデータを更新するメソッド
    */
    public function update($pokemon_data){

        $sql = "update pokemon_status set
            name = '".$pokemon_data['name']."',
            type1 = '".$pokemon_data['type1']."',
            type2 = '".$pokemon_data['type2']."',
            chara1 = '".$pokemon_data['chara1']."',
            chara2 = '".$pokemon_data['chara2']."',
            chara_sp = '".$pokemon_data['chara_sp']."',
            status_hp = '".$pokemon_data['status_hp']."',
            status_attack = '".$pokemon_data['status_attack']."',
            status_defense = '".$pokemon_data['status_defense']."',
            status_spattack = '".$pokemon_data['status_spattack']."',
            status_spdefense = '".$pokemon_data['status_spdefense']."',
            status_speed = '".$pokemon_data['status_speed']."',
            status_sum = '".$pokemon_data['status_sum']."' where dict_num = '".$pokemon_data['dict_num']."'";

        $this -> pdo() -> query($sql);
    }
}

?>