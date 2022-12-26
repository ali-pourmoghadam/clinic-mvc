<?php

use App\core\Helper;

 Helper::getPartials("navbar");

 ?>




<div class="row d-flex flex-column col-sm-5 mx-auto  mt-5 mb-5">

        <div class="filter col-sm-12">

            <form method="post"   action="<?php echo Helper::getConfig("hostName")."filterDoc"?>">
            <div class="row">
                <div class="col">
                <input type="text" class="form-control" placeholder="جستجو" name="fullName">
                </div>
                <div class="col">

                <select name="filter" class="form-select" aria-label="Default select example">

                <option value="specialty">تخصص</option>
                <option value="fullName">نام</option>
                </select>

                </div>

                <div class="col">
                    <button class="btn-secend" type="submit">فیلتر</button>
                </div>  
            </div>
            </form> 
        
        </div>

        <?php
        
            foreach($params["docs"] as $item):
        ?>

        <div class="doctor-card col-10 mx-auto d-flex flex-column mt-4">

                 <img src="<?php echo Helper::getContent("img/avatar.jpg") ?>">

                 <p class="mt-2"> نام دکتر: <span> <?php echo $item["fullName"] ?></span></p>
                 <p class="mt-2">  تخصص: <span> <?php echo $item["specialty"]; ?></span></p>
                <div class="doctor-active-days" style="width:100%; padding:5px;">
                    <p class="text-right">
                     : ساعات کاری
                    </p>

        
                <?php
            
                    foreach($item["activeDays"] as $day=>$active):
                ?>

                        <?php if ($day == "id" || $day == "doctorId" || $active  == false) continue; ?>
                    <ul >
                        <li><?php echo $day; ?> <span>10/1/1402 : </span> <span>8-10</span></li>
                      
                      
                    </ul>

                            
                <?php 
                    endforeach;
                ?>
                </div>
        </div>

        <?php 
            endforeach;
        ?>

</div>



<?php


 Helper::getPartials("footer");

 ?>
