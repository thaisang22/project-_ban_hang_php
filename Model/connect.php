<?php

class Connect {
    var $db = null;

    function __construct() {
        $dsn = 'mysql:host=localhost;port=3306;dbname=banthucpham';
        $user = 'root';
        $pass = ''; // use xampp

        $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }   

    // phuong thuc lay ve nh du leu tuc la nheu row la 1 table
    function getList($select) {
        // truy vấn th` trả về là 1 table nhều row  th` cần 1 bến chứa
        $result=$this->db->query($select);
        return $result;// tra ve 1  table
    }
    public function getInstance($select)
	{
		$results=$this->db->query($select);
		// echo $select;
		$result=$results->fetch();
		return $result;
	}
    

    // phương thức lấy về ch mot row
    function get1ROW($select) {
        $results=$this->db->query($select);
        // tra ve 1 dong th fetch luon de lay et qua
        $result=$results->fetch();
        return $result;
    }

    function exec($query)
    {
        $results=$this->db->exec($query);
        return $results;
    }

    function execP($query) {
        $statement=$this->db->prepare($query);
        return $statement;
    }
    public function getConnection() {
        return $this->db;
    }
}
  // Instantiate the Connect class
  $connection = new Connect();
?>
