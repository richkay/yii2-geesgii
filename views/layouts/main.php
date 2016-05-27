<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$asset = richkay\geesgii\GiiAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<script type="text/javascript">
		var baseUrl = "<?= Yii::$app->getUrlManager()->getBaseUrl() ?>";
	</script>
	
</head>
<body>
    <div class="container-fluid page-container">
        <?php $this->beginBody() ?>
        <?php
        NavBar::begin([
            'brandLabel' => Html::img($asset->baseUrl . '/logo.png'),
            'brandUrl' => ['default/index'],
            'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['default/index']],
                ['label' => 'Application', 'url' => Yii::$app->homeUrl],
            ],
        ]);
        NavBar::end();
        ?>
        <div class="container content-container">
            <?= $content ?>
        </div>
        <div class="footer-fix"></div>
    </div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">A Product of <a href="http://www.geesstudios.com/">Gees Dev.Team</a></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
