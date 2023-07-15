<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/sidebar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            <b>Update Copy Right</b>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="copyright" class="col-sm-2 col-form-label">Website Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Enter Copy Right">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="save" value="Update" class="btn btn-primary"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include_once 'inc/footer.php'; ?>