<?php
include 'header.php';
if (isset($_GET['id'])) {
    $employe_info = $employe_obj->view_employe_id($_GET['id']);
    if (isset($_POST['update_employe']) && $_GET['id'] === $_POST['id']) {
        $employe_obj->update_employe($_POST);
    }
} else {
    header('Location: index.php');
}

?>
    <div class="container " >
        <div class="row content">
            <a href="index.php"  class="button button-purple mt-12 pull-right">View Student List</a>
            <h3>Mettre a jour</h3>
            <?php
            if (isset($_SESSION['message'])) {
                echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
            ?>

            <hr/>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php if (isset($employe_info['id'])) {
                    echo $employe_info['id'];
                } ?>" id=""  >
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" name="name" value="<?php if (isset($employe_info['name'])) {
                        echo $employe_info['name'];
                    } ?>" id="name" class="form-control" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="address">Email address:</label>
                    <input type="text" class="form-control" value="<?php if (isset($employe_info['address'])) {
                        echo $employe_info['address'];
                    } ?>" name="address" id="address" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="contact">Téléphone:</label>
                    <input type="text" class="form-control" value="<?php if (isset($employe_info['phone'])) {
                        echo $employe_info['phone'];
                    } ?>" name="contact" id="contact"  maxlength="50">
                </div>
                <div class="form-group">
                    <label for="gender">Statut:</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="">Select</option>
                        <option value="Cadre" <?php if (isset($employe_info['gender']) && $employe_info['gender'] == 'Cadre') {
                            echo 'selected';
                        } ?>>Cadre</option>
                        <option value="Autre" <?php if (isset($employe_info['status']) && $employe_info['status'] == 'Autre') {
                            echo 'selected';
                        } ?>>Autre</option>

                    </select>

                </div>

                <input type="submit" class="button button-green  pull-right" name="update_student" value="Update"/>
            </form>
        </div>
    </div>
    <hr/>
<?php
include 'footer.php';
?>