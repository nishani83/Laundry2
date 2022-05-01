
<?php include '../common/include_head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php include '../common/include_topbar.php'; ?>

                </div>
                <div class="row mb-2">

                    <?php include 'categoryList.php'; ?>
                </div>
            </div>

        </div>

        <section class="content">
            <div class="container-fluid">
                <?php include 'items.php'; ?>
            </div>
    </div>
</div>
