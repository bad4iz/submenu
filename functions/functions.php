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

  /**
   * @return array
   */
  function get_cat() {
    $sql = "SELECT * FROM categories";

    $arr_cat = [];
    foreach ($this->selectAssoc($sql) as $key=>$value) {
      $arr_cat[$value['pa']][] = $value;
    }
    return $arr_cat;
  }

  /**
   * @param $arr
   * @param int $parent_id
   */
  function view_cat($arr,$parent_id = 0){
    if(empty($arr[$parent_id])){
      return;
    }
    echo "<ul>";
    foreach ($arr[$parent_id] as $item) {
      echo "<li><a href='#'>$item[title]</a>";
      $this->view_cat($arr,$item['id']);
      echo "</li>";
    }
    echo "</ul>";
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
}

