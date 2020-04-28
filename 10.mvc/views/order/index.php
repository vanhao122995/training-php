
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
    <form action="<?= BASE_PATH . 'index.php?module=admin&controller=order&action=index' ?>" method="GET">
        <div class="row">
                <input type="hidden" name="controller" value="order">
                <input type="hidden" name="action" value="index">
                <div class="col-sm-1">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="id" value="<?= $this->id ?>" class="form-control" placeholder="id">
                    </div> 
                </div>
                <div class="col-sm-3">
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" name="name" value="<?= $this->name ?>" class="form-control" placeholder="Nhập email">
                    </div> 
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="search" class="btn btn-primary">Tìm kiếm</button>
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
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Địa chỉ giao hàng</th>                           
                            <th scope="col">Ngày nhận</th>
                            <th scope="col">Ngày giao</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->data as $key => $obj) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $obj->name ?></td>
                            <td><?= $obj->email ?></td>
                            <td><?= $obj->so_luong ?></td>
                            <td><?= $obj->address ?></td>
                            <td><?= $obj->order_date ?></td>
                            <td><?= $obj->deliver_date ?></td>
                            <td><?= Helper::createStatus($obj->status, '', 'order') ?></td>                           
                            <td>
                                <a href="<?= BASE_PATH . 'index.php?module=admin&controller=order&action=detail&id=' . $obj->id ?>" class="btn btn-info">Xem chi tiết</a>
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
                                        $url_page = BASE_PATH . 'index.php?module=admin&controller=product&action=index&page=' . $i;
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

