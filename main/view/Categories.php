<?php

namespace view;

class Categories extends View {

    function body() {
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
        <?php
    }

}
