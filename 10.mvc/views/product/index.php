
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
    <form action="http://localhost/my-git/training-php/10.mvc/index.php?controller=product&action=index" method="POST">
        <div class="row">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="index">
                <div class="col-sm-1">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="id" value="<?= $this->id ?>" class="form-control" placeholder="id">
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" value="<?= $this->name ?>" class="form-control" placeholder="Nhập tên">
                    </div> 
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="search" class="btn btn-primary">Tìm kiếm</button>
                </div> 
                <div class="col-sm-2">
                    <a href="<?= BASE_PATH . 'index.php?controller=product&action=add' ?>" class="btn btn-primary">Thêm mới</a>
                </div> 
                            
        </div>
    </form>  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->data as $key => $obj) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $obj->name ?></td>
                            <td><?= $obj->price ?></td>
                            <td>
                                <?php 
                                    $url_status = BASE_PATH . 'index.php?controller=product&action=changeStatus&status=' . $obj->status . '&id=' . $obj->id;
                                    $url_edit = BASE_PATH . 'index.php?controller=product&action=edit&id=' . $obj->id;
                                ?>
                                <?php if($obj->status == 1) { ?>
                                    <a href="<?= $url_status ?>" class="btn btn-warning">Active</a>
                                <?php } else {?>
                                    <a href="<?= $url_status ?>" class="btn btn-info">Inactive</a>
                                <?php } ?>
                            </td>
                            <td><?= date("H:i:s d-m-Y", $obj->created) ?></td>
                            <td>
                                <a href="<?= $url_status ?>" class="btn btn-info">Delete</a>
                                <a href="<?= $url_edit ?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination"> 
                            <?php if($this->totalRows && $this->itemPerPage) { ?>
                                <?php
                                    $totalPage = ceil($this->totalRows/$this->itemPerPage);
                                    for($i = 1; $i <= $totalPage; $i++) {
                                        $url_page = BASE_PATH . 'index.php?controller=product&action=index&page=' . $i;
                                        $classActive = $this->currentPage == $i ? 'active' : '';
                                ?>                                             
                                    <li class="page-item <?= $classActive ?>"><a class="page-link" href="<?= $url_page ?>"><?= $i ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </nav>
            </div>
        </div>
    </div>

</div>

