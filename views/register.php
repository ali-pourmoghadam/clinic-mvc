<?php

 use App\core\Helper;

 Helper::getPartials("navbar");

 $model = $params["model"] ?? null;

 ?>

<div class="col-sm-4 mx-auto mt-5 mb-5">
    <h2 class="text-center">ثبت نام</h2>
        <form method="POST" action="<?php echo Helper::getConfig("hostName")."registerAction"?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label d-block" style="float:right">  ایمیل</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                 <small id="emailHelp" class="form-text text-danger">
                    <?php 
                    if($model != null && $model->hasError("email"))
                    {
                        echo $model->getFirstError("email");
                    }
                    ?>
                </small>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label d-block" style="float:right">  شماره همراه</label>
                <input type="number" name="phoneNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text"></div>

                <small id="emailHelp" class="form-text text-danger">
                    <?php 
                    if($model != null && $model->hasError("phoneNumber"))
                    {
                        echo $model->getFirstError("phoneNumber");
                    }
                    ?>
                </small>
            </div>

        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label d-block float-end">حساب کاربری</label>
                <select class="form-select text-center" name="account" aria-label="Default select example" >
            
                    <option value="patiant">بیمار</option>
                    <option value="doctor">پزشک</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label d-block float-end"> جنسیت</label>
                <select class="form-select text-center"  name="gender" aria-label="Default select example" >
            
                    <option value="man">مرد</option>
                    <option value="women">زن</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label d-block float-end">رمز عبور</label>
                <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
                
                <small id="emailHelp" class="form-text text-danger">
                    <?php 
                    if($model != null && $model->hasError("password"))
                    {
                        echo $model->getFirstError("password");
                    }
                    ?>
                </small>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1"  class="form-label d-block float-end"> تکرار رمز عبور</label>
                <input type="password" name= "passwordReapeat" class="form-control" id="exampleInputPassword1">

                <small id="emailHelp" class="form-text text-danger">
                    <?php 
                    if($model != null && $model->hasError("passwordReapeat"))
                    {
                        echo $model->getFirstError("passwordReapeat");
                    }
                    ?>
                </small>
            </div>
          
            <button type="submit" class="btn-secend d-block mx-auto mt-5">ورود</button>
    </form>

</div>




<?php

Helper::getPartials("footer");

?>