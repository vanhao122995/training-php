<?php
use Rakit\Validation\Validator;

class Product extends Controller {
    public $db_product = null;
    public function __construct() {
        parent::__construct();
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
            $name = '%' . $name . '%';
            $param['where'][] = ['name', 'LIKE', $name];
        }

        $this->view->id = $id;
        $this->view->name = $name;
        $this->view->data = $this->db_product->getAll($param);

        $this->view->load('product/index');
    }

    public function changeStatus() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if($id > 0 && $status != '') {
            $status = $status == 1 ? 0 : 1;
            $sql = "UPDATE product SET status = $status WHERE id = $id";
            if($this->db_product->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?controller=product&action=index';
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
                    'price' => $_POST['price'],
                    'detail' => $_POST['detail'],
                    'decription' => $_POST['decription'],
                ];
                $this->db_product->insert($data);
                $url = BASE_PATH . 'index.php?controller=product&action=index';
                header('location: ' . $url);
            }
        }
       
        $this->view->errors = $errors;
        $this->view->load('product/add');
    }

    //viết lại add
    //viết edit
    //nhúng 1 thư viện hình ảnh xử lý update
    //update, resize, crop 500x500 -> 200x200 -> 800x600


}