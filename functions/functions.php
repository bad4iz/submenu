<?php

class Db {
  public $link;

  function __construct($bd_name) {
    $db_base = $bd_name;
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $this->link = mysqli_connect($db_host, $db_user, $db_pass, $db_base);
  }

  function select_one($par) {
    return mysqli_fetch_array(mysqli_query($this->link, $par));
  }

  function select($par) {
    $result = mysqli_query($this->link, $par);
    $array = array();
    if ($result) {
      while ($row = mysqli_fetch_array($result)) {
        $array[] = $row;
      }
    }
    return $array;
  }
  function get_cat() {
    $sql = "SELECT * FROM categories";
//    return  $this->selectAssoc($sql);

    $arr_cat = [];
    foreach ($this->selectAssoc($sql) as $key=>$value) {
      if(empty($arr_cat[$value['pa']])){
        $arr_cat[$value['pa']] = [];
      }
      $arr_cat[$value['pa']][] = $value;
    }
    return $arr_cat;

  }

  function view_cat($arr,$parent_id = 0){
    if(){

    }
  }



  function exist($par) {
    $result = mysqli_num_rows(mysqli_query($this->link, $par));
    if ($result == 0) {
      return false;
    } else {
      return true;
    }
  }

  /**
   *  добавить запись и получить id
   * @param $par
   * @return bool|int|string
   */
  function addAndGetId($par) { //
    $result = mysqli_query($this->link, $par);
    if (!$result) {
      return false;
    }
    return mysqli_insert_id($this->link);
  }

  /**
   * @param $par
   * @return array|null
   */
  function selectAssoc($par) {
    $result = mysqli_query($this->link, $par);
    $arrayAssoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $arrayAssoc;
  }

  function sql($par) {
    mysqli_query($this->link, $par);
  }


}

