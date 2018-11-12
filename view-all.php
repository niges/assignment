<?php
include_once(__dir__.'/admin/view/layouts/head.php');
include_once(__DIR__.'/header.php');
include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__DIR__.'/admin/controller/Image.php');
include_once(__DIR__.'/admin/controller/Crud.php');
include_once(__DIR__.'/admin/data/Settings.php');
include_once(__DIR__.'/admin/controller/Subscribe.php');
include_once(__DIR__.'/admin/controller/Post.php');
include_once(__DIR__.'/admin/controller/Pagination.php');

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>
                View ALL
            </h3>
            <?php 
			if (!isset($_GET['id'])) {
				$page = 1;
			} else {
				$page = $_GET['id'];
			}
			$result =$pagination->
            select_post($page);
			?>
            <table class="table table-bordered">
                <tr>
                    <td>
                        Id
                    </td>
                    <td>
                        Title
                    </td>
                    <td>
                        Content
                    </td>
                    <td>
                        Seo Title
                    </td>
                    <td>
                        Meta Title
                    </td>
                </tr>
                <?php 	
				foreach ($result as $key =>$value) {
				?>
                <tr>
                    <td>
                        <?php echo $value['id'] ?>
                    </td>
                    <td>
                        <?php echo $value['title'] ?>
                    </td>
                    <td>
                        <?php echo $value['content'] ?>
                    </td>
                    <td>
                        <?php echo $value['seo_title'] ?>
                    </td>
                    <td>
                        <?php echo $value['meta_title'] ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="row">
        <?php
			for ($i=1; $i <= ceil($paginate/$page_no); $i++) { 
		?>
        <nav aria-label="Page navigation">
            <ul class="pagination pg-blue">
                <li class="page-item">
                    <a class="page-link" href="<?php echo $server_root; ?>view-all/<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
			}
		?>
    </div>

</div>

<?php
include_once(__dir__.'/admin/view/layouts/footer.php');
?>
</br>