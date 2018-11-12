<?php
	include_once(__dir__.'/../../data/Settings.php');
	include_once(__dir__.'/header.php');
	include(__DIR__.'/../../controller/Crud.php');
	
$result = $settings->setting();

?>

</body>

<footer class="section footer-classic context-dark bg-image" style="background: #343a40;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4">
              	<br>
                <p style="color: white;">We are an award-winning creative agency, dedicated to the best result in web design, promotion, business consulting, and marketing.</p>
                <!-- Rights-->
                <p class="rights" style="color: white"><?php foreach ($result as $key => $value) {
                	echo $value['footer'];
                } ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <br>
              <h5 style="color:white">Contacts</h5>
              <dl class="contact-list" style="color:white">
                <dt>Address:</dt>
                <dd>798 South Park Avenue, Jaipur, Raj</dd>
              </dl>
              <dl class="contact-list" style="color: white">
                <dt>email:</dt>
                <dd><a href="mailto:#" style="color:white">dkstudioin@gmail.com</a></dd>
              </dl>
              <dl class="contact-list" style="color: white">
                <dt>phones:</dt>
                <dd><a href="tel:#" style="color: white">+91 7568543012</a>
                </dd>
              </dl>
            </div>
            <div class="col-md-4 col-xl-3" style="color:white">
              <br>
              <h5>Links</h5>
              <?php 
              	$result = $crud->show_footer();
              	foreach ($result as $key => $value) {
              
              ?>
              <ul class="nav-list">
                <li><a href="http://localhost/newassign/footer/<?php echo $value['id'] ?>/" style="color: white"><?php echo $value['title'] ?></a></li>
              </ul>
          	 <?php } ?>
            </div>
          </div>
        </div>
       
</footer>
</html>