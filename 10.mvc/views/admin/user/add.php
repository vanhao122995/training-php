
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm mới sản phẩm</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
            if($this->errors) { 
        ?>
            <div class="alert alert-danger">
                <ul>
                    <?php
                        foreach($this->errors as $vl) {
                            echo '<li>'.$vl.'</li>';
                        }
                    ?>
                </ul>
            </div>
        <?php
            }
        ?>
        <form action="<?= BASE_PATH . 'index.php?module=admin&controller=user&action=add' ?>" method="POST">
            <div class="card-body">
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn trạng thái</label>
                    </div>                          
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <select name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="row">     
                    <div class="col-sm-2">
                        <label>Chọn quyền</label>
                    </div>                          
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <select name="level">
                                <option value="1">Member</option>
                                <option value="2">Admin</option>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập tên</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="name" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập email</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="email" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Địa chỉ</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="address" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Phone</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="phone" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Username</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="username" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Password</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="password" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Nhập lại password new</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="re_password" class="form-control">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Chọn hình</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="">
                            <input type="file" name="image">
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                        <a href="<?= BASE_PATH . 'index.php?module=admin&controller=user&action=index' ?>" class="btn btn-primary">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
