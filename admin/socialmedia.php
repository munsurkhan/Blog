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
                                <b>Update Social Media Information</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="google" class="col-sm-2 col-form-label">Google plus</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="google" name="google" placeholder="Google plus">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
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