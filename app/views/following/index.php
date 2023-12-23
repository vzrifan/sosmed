<div class="container mt-5">
    <div class="row">
        <div class="col">
            <table class="table table-success table-striped">
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
            <table class="table table-success table-striped">
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