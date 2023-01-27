<?php
function getQuestionClass(array $question, string $answer): string
{
    if (empty($answer)) {
        return "";
    } else if ($question["goodAnswer"] == $answer) {
        return "good-answer";
    } else {
        return "wrong-answer";
    }
}
?>

<style>
.good-answer {
    background-color: greenyellow;
}

.wrong-answer {
    background-color: red;
}
</style>

<h1><?= $quiz["title"] ?></h1>

<form method="post">
    <?php
    foreach ($quiz["questions"] as $item) :
        $currentAnswer =  $answers[$item["id"]] ?? "";
    ?>
    <div class="<?= getQuestionClass($item, $currentAnswer) ?>">
        <h3><?= $item["question"] ?></h3>
        <ul>
            <?php
                $optionSize = count($item["options"]);
                for ($i = 0; $i < $optionSize; $i++) :
                    $option = $item["options"][$i];
                ?>
            <li style="display: flex">
                <input type="radio" name="answers[<?= $item["id"] ?>]" value="<?= $i + 1 ?>"
                    <?= $currentAnswer == $i + 1 ? "checked" : "" ?>>
                <label>
                    <?= $option ?>
                </label>

            </li>
            <?php endfor; ?>
        </ul>
    </div>
    <hr>
    <?php endforeach; ?>

    <div>
        <button type="submit" name="submit">Valider</button>
    </div>
</form>