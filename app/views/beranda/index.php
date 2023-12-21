<?php foreach ($data['posting'] as $posting) : ?>
    <ul class="list-group d-flex">
        <li class="list-group-item">
            <?= $posting['username']; ?>
        </li>
        <li class="list-group-item">
            <?= $posting['content']; ?>
        </li>
        <br><br>
    <?php endforeach; ?>
    </ul>