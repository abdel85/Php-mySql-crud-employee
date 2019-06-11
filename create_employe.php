<?php
 include_once 'header.php';
 if(isset($_POST['create_employe'])){
     $employe_obj->create_employe($_POST);
 }
 ?>
<div class="container">
    <div class="row content">
        <a  href="index.php"  class="button button-purple mt-12 pull-right">Liste d'employés</a>
        <h3>Info d'employés</h3>
        <hr/>
        <form method="post" action="">
            <div class="form-group">
                <label for="address">Nom:</label>
                <input type="text" name="name" id="name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="address">Adresse:</label>
                <input type="text" name="address" id="name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="text" class="form-control" name="phone" id=" phone" required maxlength="50">
            </div>

            <div class="form-group">
                <label for="gender">Statut:</label>
                <select class="form-control" name="status" id="status">
                    <option value="" selected>Choississez</option>
                    <option value="Cadre" >Cadre</option>
                    <option value="Autre" >Autre</option>
                </select>
            </div>

            <input type="submit" class="button button-green  pull-right" name="create_employe" value="Submit"/>
        </form>
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>
