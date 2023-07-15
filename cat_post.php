<?php
include_once 'inc/header.php';

if (!isset($_GET['category']) || $_GET['category'] == NULL){
    header("Location: 404.php");
}else{
    $id = $_GET['category'];
}
$db = new Database();
$fm = new Format();
?>
<!-- Page header with logo and tagline-->
<!-- Page content-->
<div class="container blog-entries">
    <div class="row blog-sub-entries">

<div class="col-lg-8">

    <?php
    $query = "SELECT * FROM `post` WHERE `category`='$id'";
    $post_data = $db->select($query);
    if ($post_data){
        while ($post_result = $post_data->fetch_assoc())
        {
            ?>
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="post_page.php?id=<?= $post_result['id'];?>"><img class="card-img-top" src="admin/upload/<?= $post_result['image'];?>" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted"><?= $fm->formatDate($post_result['posttime']);?> <span style="font-weight: bold">by <?= $post_result['author'];?></span></div>
                    <h2 class="card-title"><a href="post_page.php?id=<?= $post_result['id'];?>"><?= $post_result['title'];?></a></h2>
                    <p class="card-text"><?= $fm->textShorten($post_result['body'],300);?></p>
                    <a class="btn btn-primary" href="post_page.php?id=<?= $post_result['id'];?>">Read more →</a>
                </div>
            </div>
            <?php
        }//end while loop
    }else{
        echo "<span class='bg-danger p-5'>Post Not Available</span>";
    }
    ?>


</div>
<?php include_once 'inc/sidebar.php'; ?>

<?php include_once 'inc/footer.php'; ?>