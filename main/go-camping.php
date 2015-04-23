<html>
    <head>
        <title>Go Camping</title>
        <?php
        include("../includes/banner.php");
        ?>
    <h2>camping equipment</h2>
    <?php
    require_once 'model/Categories.php';

    $categoriesModel = new Categories();
    ?>
    <table>
        <tr>
<?php
while ($categoriesModel->next()) {
    ?>
                <td>
                    <a href="products.php?catid=<?= $categoriesModel->getId() ?>">
                        <img src='../images/<?= $categoriesModel->getUrl() ?>' width='100px'>
                        <p><?= $categoriesModel->getName() ?></p>
                    </a>
                </td>
    <?php
}
?>
        <tr>
    </table>
<?php ?>
</body>
</html>