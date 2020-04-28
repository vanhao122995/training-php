<?php

class DB {
    private $conn = null;
    protected $table = 'product';

    public function __construct() {
        //Kết nối SQL
        $servername = "localhost" ;
        $username   = "root";
        $password   ="";
        $dtb_name   = "my_table_product";
        $connect    = @mysqli_connect($servername, $username, $password, $dtb_name);
        // Change character set to utf8     
        if($connect){
            $this->conn = $connect;
            mysqli_set_charset($connect,"utf8");
        }

    }
    //[
    //      ['select'] => ['id', 'name' ...]
    //      ['where'] => [ ['id', '=', 122], ...]
    //      ['limit'] => [offset, item in a page]
    // ]
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
        //SELECT *(id, name, status) WHERE id = 10 AND name = 'werty' LIMIT 0, 10
        //page 1 LIMIT 0, 10    => offset = (page -1)*itemperpage = 0, offset 
        //page 2 LIMIT 10, 10   10
        //page 3 LIMIT 20, 10
        //page 4 LIMIT 30, 10
        //50 10 =>  50/10 = 5 => 5 trang
        //55 10 =>  55/10 = 5.5 => 6 trang
        $sql = "SELECT $str_select FROM `$this->table` $str_where $str_limit";
        $result = mysqli_query ($this->conn, $sql);
        if($result) {
            while($item = mysqli_fetch_object($result)) {
                $data[] = $item;
            }
        }
        return $data;
    }
    public function getOne($params = []) {
      
        $data = null;
        $sql = '';
        $str_where = '';

        //xử lý điều kiện where
        if(isset($params) && !empty($params)) {
            $str_where = $this->reateSqlWhere($params);
            //SELECT *(id, name, status) WHERE id = 10 AND name = 'werty' LIMIT 0, n
            $sql = "SELECT * FROM $this->table $str_where";
            $result = mysqli_query ($this->conn, $sql);
            return mysqli_fetch_object($result);
        }
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
            $result = mysqli_query($this->conn, $sql);
            return mysqli_num_rows($result);
        }
    }

    public function reateSqlWhere($where = []) {
        $str_where = '';
        if(isset($where) && !empty($where)) {
            $str_where = 'WHERE ';
            foreach($where as $key => $row) {
                if(!empty($row)) {
                    $str_where .= $row[0] . ' ' . $row[1] . ' ' . (is_numeric($row[2]) ? $row[2] : '\'' . $row[2] . '\'');                  
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

    public function execueQuery($sql = '', $option = null) {
       if($sql) {
           if($option) {
                $data = null;
                $result = mysqli_query ($this->conn, $sql);
                if($result) {
                    while($item = mysqli_fetch_object($result)) {
                        $data[] = $item;
                    }
                }
                return $data;
           }else {
                return mysqli_query($this->conn, $sql);
           }          
       }
        return false;
    }

    public function insert($data = []) {
        // INSERT INTO table_name ('column1', column2, column3, ...)
        // VALUES (value1, value2, value3, ...);
        // $data = [
        //     'name' => $_POST['name'],
        //     'price' => $_POST['price'],
        //     'detail' => $_POST['detail'],
        //     'decription' => $_POST['decription'],
        // ];
        if(count($data) > 0) {
            $str_col = '';
            $str_val = '';
            foreach($data as $key => $row) {
                $str_col .= ',' .$key;
                $str_val .= ',' . '\'' . $row . '\'';             
            }
            $str_col =  substr($str_col , 1);
            $str_val =  substr($str_val , 1);
            $sql = "INSERT INTO $this->table ($str_col) VALUES ($str_val)";
            return $this->execueQuery($sql);
        }
     }

     public function edit($id, $data = []) {
        // UPDATE Customers
        // SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
        // WHERE CustomerID = 1;
        // $data = [
        //     'name' => $_POST['name'],
        //     'price' => $_POST['price'],
        //     'detail' => $_POST['detail'],
        //     'decription' => $_POST['decription'],
        // ];
        if(count($data) > 0) {
            $str_val = '';
            foreach($data as $key => $row) {
                if(!is_numeric($row)) {
                    $str_val .= ',' . $key . '=' . '\'' . $row . '\' ';  
                }else {
                    $str_val .= ',' . $key . '='  . $row . ' ' ;  
                }                        
            }
            $str_val =  substr($str_val , 1);
            $sql = "UPDATE $this->table SET $str_val  WHERE id=$id";
            return $this->execueQuery($sql);
        }
    }

    public function getConn() {
        return $this->conn;
    }



}