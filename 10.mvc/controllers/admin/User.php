<?php
use Rakit\Validation\Validator;

class User extends Controller {
    public $db_user = null;
    public function __construct($params) {    
        parent::__construct($params);  
        $this->db_user = $this->db('User_Model');
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
        $totalRows = count( $this->db_user->getAll($param));
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; 
        $itemPerPage = 10; //số item muốn hiển thị trên 1 trang
        $offset = $itemPerPage*($currentPage -1);
        $param['limit'] = [$offset, $itemPerPage];

        $this->view->currentPage = $currentPage;
        $this->view->totalRows = $totalRows;
        $this->view->itemPerPage = $itemPerPage;
        $this->view->id = $id;       
        $this->view->name = $name;
        $this->view->data = $this->db_user->getAll($param);
        $this->view->template = 'user/index';
        $this->view->load('layout');
    }

    public function changeStatus() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $status = isset($_GET['status']) ? $_GET['status'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "UPDATE user SET status = $status WHERE id = $id";
            if($this->db_user->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function add() {
        $errors = [];

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'username'                  => 'required|min:3',
                'email'                 => 'required|email',
                'password'                 => 'required',
            ]);

            $validation->setMessages([
                'username:required' => ':attribute không được rỗng',
                'email:required' => 'Email không được rỗng',
                'email:email' => 'Email chưa đúng',
                'password:required' => ':attribute không được rỗng',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                $flag_insert = true;
                //check pass and re pass
                if($_POST['password'] != $_POST['re_password']) {
                    $errors[] = 'Password không trùng khớp';
                    $flag_insert = false;
                } 

                if($this->db_user->isExistRecord([['username', '=', $_POST['username']]])) {
                    $errors[] = 'Username đã tồn tại';
                    $flag_insert = false;
                } 

                if($flag_insert) {
                    //insert
                    $data = [
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'address' => $_POST['address'],
                        'phone' => $_POST['phone'],
                        'username' => $_POST['username'],
                        'password' => md5($_POST['password']),
                        'image' => '',
                        'level' => $_POST['level'],
                        'status' => $_POST['status'],
                        'created' => time()
                    ];
                    $this->db_user->insert($data);
                    $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                    header('location: ' . $url);
                }        
            }
        }
        
        $db = $this->db('Category_user_Model');
        $this->view->errors = $errors;
        $this->view->template = 'user/add';
        $this->view->load('layout');
    }

    //viết lại add
    //viết edit
    //nhúng 1 thư viện hình ảnh xử lý update
    //update, resize, crop 500x500 -> 200x200 -> 800x600
    public function edit() {
        $errors = [];
        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
        $id = isset($_GET['id']) ?  $_GET['id'] : 0;

        $isUser = $this->db_user->isExistRecord([['id', '=', $id]]);
        if($isUser <= 0) {         
            header('location: ' . $url);
        }

        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'email'                 => 'required|email',
            ]);

            $validation->setMessages([
                'email:required' => 'Email không được rỗng',
                'email:email' => 'Email chưa đúng',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                $flag_insert = true;
                if($_POST['password_old']) {
                    if(!$this->db_user->isExistRecord([['id', '=', $id], ['password', '=', md5($_POST['password_old'])]])) {
                        $errors[] = 'Password current không đúng';
                        $flag_insert = false;
                    }else {
                        if(empty($_POST['password'])) {
                            $errors[] = 'Password mới không được rỗng';
                            $flag_insert = false;
                        }else {
                            //check pass and re pass
                            if($_POST['password'] != $_POST['re_password']) {
                                $errors[] = 'Password không trùng khớp';
                                $flag_insert = false;
                            } 
                        }
                    }
                    
                }
              

                if($flag_insert) {
                    //echo  md5($_POST['password']);die();
                    //insert
                    $data = [
                        'name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'address' => $_POST['address'],
                        'phone' => $_POST['phone'],
                        'username' => $_POST['username'],
                        'password' => md5($_POST['password']),
                        'image' => '',
                        'level' => $_POST['level'],
                        'status' => $_POST['status'],
                        'created' => time()
                    ];
                    $this->db_user->edit($id, $data);
                    $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                    header('location: ' . $url);
                }        
            }
        }
       
        $this->view->errors = $errors;
        $this->view->item = $this->db_user->getOne([['id', '=', $id]]);
        $this->view->template = 'user/edit';
        $this->view->load('layout');
    }

    public function delete() {

        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id > 0) {
            $status = $status == 1 ? 0 : 1;
            $sql = "DELETE FROM user WHERE id = $id";
            if($this->db_user->execueQuery($sql)) {
                $url = BASE_PATH . 'index.php?module=admin&controller=user&action=index';
                header('location: ' . $url);
            }
        }
    }

    public function login() {   
        $errors = [];
        if(isset($_POST['submit'])) {
            $validator = new Validator;
            $validation = $validator->make($_POST, [
                'username'                  => 'required',
                'password'                 => 'required',
            ]);

            $validation->setMessages([
                'username:required' => ':attribute không được rỗng',
                'password:required' => ':attribute không được rỗng',
            ]);
    
            $validation->validate();
    
            if ($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->firstOfAll();
            } else {
                if(!$this->db_user->isExistRecord([['username', '=', $_POST['username']], ['password', '=', md5($_POST['password'])]])) {
                    $errors[] = 'Thông tin đăng nhập chưa đúng';
                }else {
                    $user = $this->db_user->getOne([['username', '=', $_POST['username']], ['password', '=', md5($_POST['password'])]]);
                    $_SESSION['isLogin'] = true;
                    $_SESSION['user'] = $user;
                    $url = BASE_PATH . 'index.php?module=admin&controller=product&action=index';
                    header('location: ' . $url);
                }
            }
        }
        $this->view->errors = $errors;
        $this->view->load('login');
    }

    public function logout() {
        session_destroy();
        $url = BASE_PATH . 'index.php?module=admin&controller=user&action=login';
        header('location: ' . $url);
    }

}