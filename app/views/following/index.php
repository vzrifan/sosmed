<div class="container">
    <div class="col">
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            tambah
        </button>
    </div>
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <th>Followers</th>
                </tr>
                <?php foreach ($data['follower'] as $follower) : ?>
                    <tr>
                        <td><?= $follower['follower']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Following</th>
                </tr>
                <?php foreach ($data['following'] as $following) : ?>
                    <tr>
                        <td><?= $following['following']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>