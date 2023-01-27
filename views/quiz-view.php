<h1><?= $quiz["title"] ?></h1>

<?php foreach ($quiz["questions"] as $item) : ?>
<div>
    <h3><?= $item["question"] ?></h3>
    <ul>
        <?php foreach ($item["options"] as $option) : ?>
        <li style="display: flex">
            <input type="radio" name="answers[<?= $item["id"] ?>][]">
            <label>
                <?= $option ?>
            </label>

        </li>
        <?php endforeach; ?>
    </ul>
</div>
<hr>

<?php endforeach; ?>