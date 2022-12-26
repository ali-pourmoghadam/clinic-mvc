<?php
use App\core\Application;
?>
<div class="row">
  <div class="col-sm-10 mx-auto">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

      <?php  if(Application::$App->isGuest()) : ?>
        <a class="btn-default" href="<?php echo  Application::$App->getConfig("hostName") ?>login">ورود</a>
        <a class="btn-secend"   href="<?php echo  Application::$App->getConfig("hostName") ?>register">ثبت نام</a>
      <?php
      else:
      ?>

       <a class="btn-default">پروفایل</a>
        <a class="btn-secend"   href="<?php  echo  Application::$App->getConfig("hostName") ?>logout">خروج</a>

      <?php 
        endif;
      ?>



    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <div class="navbar-nav nav-item-custom" dir="rtl" >
        <a class="nav-item nav-link active" href="<?php echo  Application::$App->getConfig("hostName") ?>">خانه</a>
        <a class="nav-item nav-link"  href="<?php echo  Application::$App->getConfig("hostName") ?>doctorsList">پزشکان</a>
        <a class="nav-item nav-link" href="http://localhost/maktab-tamrin/w-14/login">تماس با ما</a>
        <a class="nav-item nav-link" href="http://localhost/maktab-tamrin/w-14/login">بلاگ </a>
      </div>
      
    </div>
    </nav>
  </div>
</div>