<?php
require_once('session.php');
require_once('../db/db.php');
require_once('../db/HallAPI.php');
require_once('../db/pictureAPI.php');

if(isset($_POST['hall_id']))
{
	if(!empty($_POST['hall_id']))
	{            
	$hall_id=$_POST['hall_id'];      
	}
}
if(isset($_POST['idimage']))
{
    
    if(!empty($_POST['idimage']))
    {
        $idimage=$_POST['idimage'];        
        $pic=  dyw_picture_get_buy_id($idimage);
        if($pic){           
            $picimage=$pic->picture_path;
           
            $pc= dyw_picture_delete($idimage);
            if($pc){
                if(file_exists($picimage))
		{                    
			unlink($picimage);
		}
                dyw_db_close();
                echo "تمت العملية بنجاح";
            }else{
                   dyw_db_close();
                echo "فشلت العملية";
            }
        }                
    }
}
else{
    echo "لم ترسل بيانات";
}



