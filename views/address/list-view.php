<h1>Liste des adresses</h1>

<div>
    <a href="/address/new">Ajout d'une adresse</a>
</div>
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
                <a href="/address/update?id=<?= $address["id"] ?>">
                    Modifier
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>