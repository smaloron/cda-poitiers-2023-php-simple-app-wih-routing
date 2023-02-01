<h1>Liste des adresses</h1>

<table>
    <thead>
        <tr>
            <th>rue</th>
            <th>code postal</th>
            <th>ville</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($addressList as $address) : ?>
        <tr>
            <td><?= $address["rue"] ?></td>
            <td><?= $address["code_postal"] ?></td>
            <td><?= $address["ville"] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>