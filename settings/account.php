 <?php 
  require_once('db/db.php');
 require_once('db/ClinteAPI.php');
 if(!empty($_SESSION['user_info'])) {
$id_clinte=$_SESSION['user_info'];
$clintes=dyw_clinte_get_buy_id($id_clinte->clinte_id);
if(!$clintes){
    dyw_db_close();
    die("not found");
} }else{
       header('Location:index.php');
      
 }
?>
<div class="page-header" id="account"><h4>إعدادات الحساب العامة</h4> </div>
             <table class="table table-striped table-hover">
                 <tbody>
                     <tr>
                         <td class="span2"><h4 class="font-new2">الاسم</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3"><?php echo $clintes->clinte_name; ?></h4>
                               <input type="text"  placeholder="الاسم" name="name_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1  btn-updata-account"><h4 class="font-new pull-right"><a>تعديل</a></h4></td>                           
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">رقم الهاتف</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3"><?php echo $clintes->clinte_phone; ?></h4>
                         <input type="text"  placeholder="7xxxxxxxx" name="phone_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                         <td class="span1 btn-updata-account"><h4 class="font-new pull-right"><a href="#">تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">البريد الالكتروني</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3"><?php echo $clintes->clinte_email; ?></h4>
                         <input type="text"  placeholder="البريد الالكتروني exmple@email.com" name="email_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata-account"><h4 class="font-new pull-right"><a href="#">تعديل</a></h4></td>
                     </tr>
                     <tr>
                         <td class="span2"><h4 class="font-new2">اسم الدخول</h4></td>
                         <td class="span5 name-updat"><h4 class="font-new3"><?php echo $clintes->clinte_user; ?></h4>
                         <input type="text"  placeholder="اسم الدخول" name="user_acc" class="input-xlarge" style="display: none;">
                           <span class="alert" style="display: none;"></span>
                         </td>
                          <td class="span1 btn-updata-account"><h4 class="font-new pull-right"><a href="#">تعديل</a></h4></td>
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
