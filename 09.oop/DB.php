<?php

class DB {
    private $conn = null;
    private $table = null;

    public function __construct() {
        //Kết nối SQL
        $servername = "localhost" ;
        $username   = "root";
        $password   ="";
        $dtb_name   = "my_table_product";
        $table      = "product";
        $connect    = @mysqli_connect($servername, $username, $password, $dtb_name);
        // Change character set to utf8     
        if($connect){
            $this->conn = $connect;
            $this->table = $table;
            mysqli_set_charset($connect,"utf8");
        }

    }

    public function getAll($params = []) {
        $data = null;
        $sql = '';
        $str_where = '';
        $str_select = '*';
        $str_limit = '';

        //xử lý điều kiện select
        if(isset($params['select']) && !empty($params['select'])) {
            $str_select = implode(',', $params['select']);
        }

        //xử lý điều kiện where
        if(isset($params['where']) && !empty($params['where'])) {
            $str_where = $this->reateSqlWhere($params['where']);
        }

        //xử lý điều kiện limit
        if(isset($params['limit']) && !empty($params['limit'])) {
            $param_limit = $params['limit'];
            $str_limit = 'LIMIT ' . $param_limit[0] . ',' . $param_limit[1];//LIMIT 0, 10
        }
        //SELECT *(id, name, status) WHERE id = 10 AND name = 'werty' LIMIT 0, n
        $sql = "SELECT $str_select FROM $this->table $str_where $str_limit";
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data[] = $item;
            }
        }
        return $data;
    }
    //DELETE FROM product WHERE id = 10; key = value 
    //DLETE FROM product WHERE key IN ('', '2', 3,.....n)
    //[1, 2, 3 .......n = 1000]
    public function delete($value) {
        if(!is_array($value)) {
            if(!empty($value)) {
                $sql = "DELETE FROM $this->table WHERE id = $value";
                return mysqli_query ($this->conn, $sql);
            }
        }else {
            // foreach($value as $val) {
            //     $sql = "DELETE FROM $this->table WHERE $key = " .  (is_numeric($val) ? $val : '\'' . $val . '\'');
            //     mysqli_query ($this->conn, $sql);
            // }
            $sql = "DELETE FROM $this->table WHERE id IN " . "(" . implode(',', $value) . ")";
            mysqli_query ($this->conn, $sql);
        }
    }
    //[['id', '=', 123456]]
    public function isExistRecord($where = []) {
        //SELECT * FROM user WHERE password = old
        $str_where = '';
         //xử lý điều kiện where
         if(isset($where) && !empty($where)) {
            $str_where = $this->reateSqlWhere($where);
            $sql = "SELECT * FROM $this->table $str_where";
            return mysqli_query ($this->conn, $sql);
        }
    }

    public function reateSqlWhere($where = []) {
        $str_where = '';
        if(isset($where) && !empty($where)) {
            foreach($where as $key => $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . $row[1] . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
                }
                //1 => 0 key       => 0 => count
                //2 => 0 1   key   => 1
                //3 => 0 1 2  key  => 2
                if(count($where) - 1 != $key) {
                    $str_where .= ' AND ';
                }
                
            }
        }
        return $str_where;
    }

    //update single - muilti
    //insert 

}