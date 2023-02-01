<h1>Liste des adresses</h1>

<table>
    <thead>
        <tr>
            <th>rue</th>
            <th>code postal</th>
            <th>ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($addressList as $address) : ?>
        <tr>
            <td><?= $address["rue"] ?></td>
            <td><?= $address["code_postal"] ?></td>
            <td><?= $address["ville"] ?></td>
            <td>
                <a href="/address/delete?id=<?= $address["id"] ?>">
                    Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>