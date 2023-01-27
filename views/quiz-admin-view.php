<h1>Administration de <?= $quiz["title"] ?></h1>


<div style="text-align: right">
    <a href="/quiz-add-question">Ajouter une question</a>
</div>
<table>
    <thead>
        <tr>
            <th>Question</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($quiz["questions"] as $item) : ?>
        <tr>
            <td><?= $item["question"] ?></td>
            <td>
                <a href="/quiz-delete?id=<?= $item["id"] ?>">Supprimer</a>
                <a href="/quiz-update?id=<?= $item["id"] ?>">Modifier</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>