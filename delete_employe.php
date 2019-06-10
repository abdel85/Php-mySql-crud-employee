<?php
include 'header.php';
if(isset($_GET['id'])){
    $employe_info=$employe_obj->delete_employe_info_by_id($_GET['id']);


}else{
    header('Location: index.php');
}


