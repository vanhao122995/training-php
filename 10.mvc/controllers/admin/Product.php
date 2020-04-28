<?php
use Rakit\Validation\Validator;

class Product extends Controller {
    public $db_product = null;
    public function __construct($params) {
        parent::__construct($params);
        $this->db_product = $this->db('Product_Model');
    }

    public function index() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $param = [];

        if($id) {
            $param['where'][] = ['id', '=', $id];
            
        }
        if($name) {       
            $param['where'][] = ['name', 'LIKE', '%' . $name . '%'];
        }

        //phân trang
        $totalRows = count( $this->db_product->getAll($param));
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
        $itemPerPage = 10; //số item muốn hiển thị trên 1 trang
        $offset = $itemPerPage*($currentPage -1);
        $param['limit'] = [$offset, $itemPerPage];

        $this->view->currentPage = $currentPage;
        $this->view->totalRows = $totalRows;
        $this->view->itemPerPage = $itemPerPage;
        $this->view->id = $id;       
        $this->view->name = $name;
        $this->view->data = $this->db_product->getAll($param);
        $this->view->template = 'product/index';
        $this->view->load('layout');
    }

    public function changeStatus() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "UPDATE product SET status = $status WHERE id = $id";
            if($this->db_product->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function add() {
        $errors = '';

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'name'                  => 'required|min:5',
                'price'                 => 'required|numeric',
            ]);

            $validation->setMessages([
                'name:required' => 'Tên sản phẩm không được rỗng',
                'price:required' => 'Giá sản phẩm không được rỗng',
                'numeric' => ':attribute phải là số',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                //image

                //insert
                $data = [
                    'name' => $_POST['name'],
                    'category_id' => $_POST['category_id'],
                    'price' => $_POST['price'],
                    'detail' => $_POST['detail'],
                    'decription' => $_POST['decription'],
                    'status' => $_POST['status'],
                    'created' => time()
                ];
                $this->db_product->insert($data);
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
        
        $db = $this->db('Category_product_Model');
        //danh sách cate
        $this->view->list_category_product = $db->getAll();
        $this->view->errors = $errors;
        $this->view->template = 'product/add';
        $this->view->load('layout');
    }

    //viết lại add
    //viết edit
    //nhúng 1 thư viện hình ảnh xử lý update
    //update, resize, crop 500x500 -> 200x200 -> 800x600
    public function edit() {
        $errors = '';
        $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
        $id = isset($_GET['id']) ?  $_GET['id'] : 0;

        $isProduct = $this->db_product->isExistRecord([['id', '=', $id]]);
        if($isProduct <= 0) {         
            header('location: ' . $url);
        }

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'name'                  => 'required|min:5',
                'price'                 => 'numeric',
            ]);

            $validation->setMessages([
                'name:required' => 'Tên sản phẩm không được rỗng',
                'numeric' => ':attribute phải là số',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                //image

                //edit
                $data = [
                    'name' => $_POST['name'],
                    'category_id' => $_POST['category_id'],
                    'price' => $_POST['price'],
                    'detail' => $_POST['detail'],
                    'decription' => $_POST['decription'],
                    'status' => $_POST['status'],
                    'created' => time()
                ];
                $this->db_product->edit($id, $data);
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
       
        $db = $this->db('Category_product_Model');
        //danh sách cate
        $this->view->list_category_product = $db->getAll();
        $this->view->errors = $errors;
        $this->view->item = $this->db_product->getOne([['id', '=', $id]]);
        $this->view->template = 'product/edit';
        $this->view->load('layout');
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "DELETE FROM product WHERE id = $id";
            if($this->db_product->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                header('location: ' . $url);
            }
        }
    }

}