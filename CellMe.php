<?php
$pageTitle="YemenWedding";
    $page="HOME";
    include 'inc/header.php';
 ?>

<div class="page-header">
        <h4> اتصال بناء </h4>
</div>
<form class="form-horizontal  mt-10" method="POST" action="" id="addclient" >
    <div class="control-group">
        <label class="control-label" for="name_hall">الاسم</label>
        <div class="controls">
            <input type="text" id="name_hall" placeholder="الاسم " name="name_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
    </div>
<div class="control-group">
        <label class="control-label" for="name_hall">البريد الالكتروني</label>
        <div class="controls">
            <input type="text" id="name_hall" placeholder="البريد الالكتروني: example@example.com" name="name_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
</div>
    <div class="control-group">
        <label class="control-label" for="name_hall"> رقم الجوال</label>
        <div class="controls">
            <input type="text" id="name_hall" placeholder="رقم الجوال" name="name_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
</div>
    <div class="control-group">
        <label class="control-label" for="name_hall">عنوان الرساله </label>
        <div class="controls">
            <input type="text" id="name_hall" placeholder="عنوان الرسالة" name="name_hall" class="input-xlarge">
            <span class="help-inline"></span>
        </div>
</div>
  
 <div class="control-group">
    <label class="control-label" for="details_hall">محتوى الرسالة</label>
    <div class="controls">
    <textarea id="details_hall" placeholder="محتوى الرسالة" name="details_hall" rows="4" class="input-xxlarge"></textarea>
        <span class="help-inline"></span>
    </div>
  </div>
<div class="control-group">
<div class="controls">                     
  <button type="submit" class="btn">ارسال</button>
</div>
</div>
</form>

<?php include 'inc/footer.php'; ?>
