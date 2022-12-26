<?php

use App\core\Helper;

 Helper::getPartials("navbar");

 ?>

<div class="row d-flex flex-column col-sm-5 mx-auto  mt-5 mb-5">


        <div class="doctor-card col-10 mx-auto d-flex flex-column mt-4">

                 <img src="<?php echo Helper::getContent("img/avatar.jpg") ?>">

                 <p class="mt-2"> نام دکتر: <span> <?php echo $params["docs"][0]["fullName"] ?></span></p>
                 <p class="mt-2">  جنیست: <span> <?php echo $params["docs"][0]["gender"]; ?></span></p>
               
        </div>
</div>



<?php


 Helper::getPartials("footer");

 ?>
