<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="<?= BASE_PATH ?>/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= BASE_PATH ?>/public/css/css.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= BASE_PATH ?>/public/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
            <?php
                include("./views/elements/sidebar.php");
            ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                    <?php
                        include("./views/elements/navbar.php");
                        include("./views/$this->template.php");
                    ?>
            </div>
            <?php
                include("./views/elements/footer.php");
            ?>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASE_PATH ?>/public/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASE_PATH ?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= BASE_PATH ?>/public/js/sb-admin-2.min.js"></script>
</body>

</html>