<div class="container mt-4">
    <?php foreach ($data['userPost'] as $posting) : ?>
        <div class="row justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><?= $posting['username']; ?></h5>
                            <p class="card-text"><small class="text-muted"><?= $posting['post_date']; ?></small></p><br>
                            <p class="card-text"><?= $posting['content']; ?></p><br>
                            <?php
                            $imagePath = '/sosmed/public/img/' . str_replace(array("-", ":", " "), "", $posting['post_date']) . '.jpg';

                            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                                echo '<img src="' . $imagePath . '" class="card-img-top mx-auto d-block" alt="photo" height="300" style="width: auto;">';
                            }

                            ?>
                            <?= $posting['likeBtn']; ?>
                            <p>Total Likes: <?= $posting['totalLikes']; ?></p>
                            <div class="col">
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="heading<?= $posting['id_posting']; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $posting['id_posting']; ?>" aria-expanded="false" aria-controls="collapse<?= $posting['id_posting']; ?>">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAQ9JREFUSEvt1zFOw0AQheEvNQXcACIuEAlRwyFyhEhI9NQkPS0NEgUtXIL0FLRBCskVQEK0iQsjYxkym8SYCFzaM+/febNaz7Y09LQa4iqDt9BFe80LmuAW77luEbyDB+yvGZrLjXCAt+xFEXyKy5qguWwP12VwH+c1gwdz/YzzqeJ/cO76Cx4TW9DBdkVOktVDHCeC73G0seDGrE50+dvwpB5HKt7DbmCFSeDI5oqeAZsBbszqQOvCIUlWh1UDgX8PfIKrn/4tPuEQrxHwDaaB3i0KecbdVzNX+RD42AiLVJf5Xpy5iuCL+VB2toxgNKcKXDu0qsfZXF1rpVVzdTZPj6NWrRr3a64wqxYSzp8BzmhIH416I5UAAAAASUVORK5CYII=" />
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $posting['id_posting']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $posting['id_posting']; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php foreach ($posting['comments'] as $comment) : ?>
                                                <div class="card-body">
                                                    <p class="card-text"><strong><?= $comment['username']; ?>:</strong> <?= $comment['comment_text']; ?></p>
                                                    <p class="card-text"><small class="text-muted"><?= $comment['comment_date']; ?></small></p>
                                                </div>
                                            <?php endforeach; ?>
                                            <br><br>
                                            <form class="d-flex" action="<?= BASEURL; ?>/beranda/comment/<?= $posting['id_posting']; ?>" method="post">
                                                <input class="form-control me-2" type="text" id="comment" name="comment">
                                                <button type="submit"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAlNJREFUSEvN1smrjmEYBvDfMSxYKJSQhUKyI/4CxFKhTNmaSooyZVhQjgxFmW1EhhI2RImNhUKsZNwpGVOSBeG96/n09vY+5zvfOd/pnKu+vqn3vu7hua776dBP6OgnXgOKeDzG4UlfdqNa8SS8wJBEvA/X8LfdSVSJJ+N1heQl9uM8frcrgboZv8fYGoJ3OFSM4RR+9jaBOuKLWJaCn8AaDC8RfcHR9PrW0wTqiFcXFZ9MAafiIzZgPUaXiH7gNA4gutQS6oiDLA5YYBXOpM/DUvUbMaHE8ivNPw7im+6y53Qc7RyFaPuKSrChWInNiCQb+IMbhSL24mmzBHLEl7EEnzA/E2gQFmNbQTi9QnQHB3E3l0COeB2OlR66VWh5Nx5nAs1NCcyu/P8Inbhe9YIc8TQ8ryGJCnbiYSaBWYXWdxQdWlDjBTGCC43fu/LqDxiTIWiWQMx+azoLg0sxluJKfO8p8X3swoNMYlNS6+MQhv02sLw4kJe6Is61+mY6tblWz8B2LKoU9RZ7cK5Zq9cWbT7ewuGakyqM9zLiMIa+Q2Yht/9oJqfPmJeRUzy7MBHOrBDeS452u1U5fcXINI+YSxkxs5jdloyBRIU52XVZcXm+4dvhx4GwzPi+qcYyQyaxOmOFdgt1rS7Pt9mSCB+PVRkrsyXUETfs8ntR2dlUZXktxhjC1Y4UGys8vUeoI27MtxowqjqcWh8rsVeoEofwX1UixlUo/DauPrEC24Iq8cR054qT+yxp8GpVg+1gzl0ERiA2S59hQF3o+6zKcuB+q/gfwKt6H2nq5kkAAAAASUVORK5CYII=" /></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>