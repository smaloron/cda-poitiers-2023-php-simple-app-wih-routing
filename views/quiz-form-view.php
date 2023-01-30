<h1><?= $title ?></h1>

<?php var_dump($question) ?>

<form method="post">
    <div>
        <label>Question</label>
        <input type="text" name="question" style="width: 100%" value="<?= $question["question"] ?? "" ?>">
    </div>

    <div style="display: flex; justify-content: space-between">
        <h4>Les réponses</h4>
        <button type="button" id="addAnswerButton" style="align-self: center">
            Ajouter une réponse
        </button>
    </div>


    <div id="answerList">
        <?php
        if ($updateMode && isset($question["options"])) :
            foreach ($question["options"] as $item) :
        ?>
        <div id="template" style="display:flex; margin-bottom: 10px">
            <input type="text" name="options[]" style="width: 100%; margin-right: 10px" value="<?= $item ?? "" ?>">
            <button type="button" class="delete">Supprimer</button>
        </div>

        <?php
            endforeach;
        endif;
        ?>
    </div>

    <div>
        <label>Bonne réponse</label>
        <input type="number" min="1" name="goodAnswer" value="<?= $question["goodAnswer"] ?? "" ?>">
    </div>

    <div>
        <button type="submit" name="submit">Valider</button>
    </div>
</form>

<script>
$(document).ready(function() {
    const $target = $("#answerList");
    const $template = $("#template").clone().removeAttr("id");
    $("#addAnswerButton").click(function() {
        $newAnswer = $template.clone();
        $target.append($newAnswer);
    });
    $target.delegate(".delete", "click", function() {
        $(this).parent().remove();
    });
});
</script>