<?php

require_once '../db/admin.php';
if(!empty($_SESSION['user_admin']))
 {
$id_admin=$_SESSION['user_admin'];
$admins=dyw_admin_get_buy_id($id_admin->admin_id);
if(!$admins){
    dyw_db_close();
    die("not found");
    header("location:index.php");
}
 }else{
      header("location:index.php");
 }
 ?>
<div class="page-header" id="account"><h4>إعدادات الحساب العامة</h4> </div>
             <table class="table table-striped table-hover">
                 <tbody>
                     <tr>
                         <td class="span2"><h4 class="font-new2">الاسم</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3"><?php echo $admins->admin_name; ?></h4>
                               <input type="text"  placeholder="الاسم" name="name_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1  btn-updata-account"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>                           
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">كلمة المرور</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3">خالد</h4>
                             <input type="password"  placeholder="كلمة المرور" name="password_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata-account"><h4 class="font-new pull-right"><a href="#">تعديل</a></h4></td>
                     </tr>
                 </tbody>
            </table>    
