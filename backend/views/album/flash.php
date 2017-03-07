<?php
foreach(Yii::$app->session->getAllFlashes() as $type => $message): ?>
    <?php foreach($message as $mes): ?>
        <div class="alert alert-<?= $type ?>" role="alert"><?= $mes ?></div>
    <?php endforeach ?>
<?php endforeach ?>