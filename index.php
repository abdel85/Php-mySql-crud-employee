<?php
include 'header.php';
$employe_list = $employe_obj->employe_list();


?>
<div class="container " >
    <div class="row content">
        <a  href="create_employe.php"  class="button button-purple mt-12 pull-right">Ajouter un employe</a>
        <h3>Employes List</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Statut</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if ($employe_list->num_rows > 0) {

                while ($row = $employe_list->fetch_assoc()) {

                    ?>

                    <tr>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["address"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td class="text-right">
                            <a  href="<?php echo 'delete_employe.php?id=' . $row["id"] ?>" class="button button-red">Supprimer</a>
                            <a  href="<?php echo 'update_employe.php?id=' . $row["id"] ?>" class="button button-blue">Editer</a>
                            <a href="<?php echo 'read_employe.php?id=' . $row["id"] ?>" class="button button-green">Detail</a>
                        </td>
                    </tr>
                    <?php

            }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<?php
include 'footer.php';
?>

