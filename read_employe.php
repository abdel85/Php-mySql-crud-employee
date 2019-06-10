<?php
include 'header.php';


if(isset($_GET['id'])){
    $employe_info=$employe_obj->view_employe_id($_GET['id']);




}else{
    header('Location: index.php');
}


?>
<div class="container " >

    <div class="row content">




        <a  href="index.php"  class="button button-purple mt-12 pull-right">Voir la liste des employes</a>

        <h3>Voir Infos employes</h3>


        <hr/>




        <label >Nom:</label>
        <?php  if(isset($student_info['student_name'])){echo $student_info['name']; }?>

        <br/>
        <label>Adresse:</label>
        <?php  if(isset($employe_info['email_address'])){echo $employe_info['address'];} ?>

        <br/>
        <label >Téléphone:</label>
        <?php  if(isset($employe_info['phone'])){echo $employe_info['phone'];} ?>
        <br/>

        <label >Etat:</label>
        <?php  if(isset($employe_info['status'])){echo $employe_info['status'];} ?>
        <br/>




        <a href="<?php echo 'update_employe.php?id='.$employe_info["id"] ?>" class="button button-blue">Edit</a>





    </div>

</div>
<hr/>
<?php
include 'footer.php';
?>

