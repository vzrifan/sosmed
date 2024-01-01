<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-3">
            <table class="table table-light table-striped">
                <tr>
                    <th style="text-align: center;">Followers</th>
                </tr>
                <?php foreach ($data['follower'] as $follower) : ?>
                    <tr>
                        <td><?= $follower['follower']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-3">
            <table class="table table-light table-striped">
                <tr>
                    <th style="text-align: center;">Following</th>
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