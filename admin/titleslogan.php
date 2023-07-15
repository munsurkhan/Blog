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
                                <b>Update Site Title & Description</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Website Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tile" name="title" placeholder="Enter Website Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slogan" class="col-sm-2 col-form-label">Website Slogan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Enter Website Slogan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="submit" name="save" value="Save" class="btn btn-primary"/>
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