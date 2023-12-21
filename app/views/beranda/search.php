<div class="container">
    <table>
        <tr>
            <th>username</th>
        </tr>
        <?php foreach ($data['users'] as $user) : ?>
            <tr>
                <td><?= $user['username']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>