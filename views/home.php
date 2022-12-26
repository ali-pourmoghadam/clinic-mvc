<?php

 use App\core\Helper;
 Helper::getPartials("navbar");

 ?>


<div class="col-sm-8 mx-auto d-flex flex-row home-intro">

    <div>
        <img src="<?php echo Helper::getContent("img/logo.svg") ?>" alt="">
    </div>

    <div>
        <h1>همراه شما تا درمان</h1>

        <div class="search-wrapper">
            <form action="<?php echo Helper::getConfig("hostName")."searchDoc"?>" method="POST">
                <input type="text" name="name"  class="search" placeholder="جستجوی نام پزشک" dir="rtl">
                <button class="search-btn" type="submit">
                <i class="fa-brands fa-searchengin" style="z-index: 2;" ></i>
                </button>
            </form>
           
        </div>

        <ul class="description">
            <li class="item">جستجوی نام یا تخصص پزشک </li>
            <li class="item">انتخاب پزشک بر اساس مطالعه پروفایل اختصاصی ایشان</li>
            <li class="item">نوبت گیری آنلاین</li>
            <li class="item">ملاقات حضوری یا مجازی پزشک، ایجاد پرونده پزشکی برای بیمار و صدور نسخه الکترونیک</li>
        </ul>

    </div>


</div>




<div class="clinic-info col-sm-8 mx-auto  d-flex flex-row">


    <div class="clinic-info-item d-flex flex-column">

        <img class="mx-auto" src="<?php echo Helper::getContent("img\\eye.svg") ?>" alt="">
        <div>
            <h5>جستجو در بین بهترین پزشکان</h5>
            <p>
            گلچینی از برترین پزشکان منطقه و شهر خود را می‌توانید  بیابید
            </p>
        </div>

    </div>
    <div class="clinic-info-item d-flex flex-column">

        <img class="mx-auto" src="<?php echo Helper::getContent("img\\lung.svg") ?>" alt="">
        <div>
            <h5>انتخاب زمان ویزیت پزشک</h5>
            <p>
            براساس برنامه‌ی کاری و تقویم خودتان، زمان ویزیت پزشک را انتخاب کنید
            </p>
        </div>

    </div>
    <div class="clinic-info-item d-flex flex-column">

        <img class="mx-auto" src="<?php echo Helper::getContent("img\\brain.svg") ?>" alt="">
        <div>
            <h5>بهره‌مندی از روند درمان هوشمند</h5>
            <p>
            پزشکان  از ابزارهای هوشمند در روند درمان بهره می‌گیرند.
            </p>
        </div>

    </div>

</div>



<div class="col-sm-12 regsiterWrapper">
    <div class="regsiterWrapper-gray">
        <div class="texts">
            <h2> عضویت پزشکان</h2>
         <p>همین حالا ثبت نام کنید</p>

         <a href=""><div href="#" class="btn-default d-block mx-auto">ثبت نام</div></a>
        </div>
    </div>
</div>


<?php

Helper::getPartials("footer");

?>