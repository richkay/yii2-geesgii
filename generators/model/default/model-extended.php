<?php

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
use \<?= $generator->ns ?>\base\<?= $className ?> as Base<?= $className ?>;

/**
 * This is the model class for table "<?= $tableName ?>".
 */
class <?= $className ?> extends Base<?= $className . "\n" ?>
{
    <?php foreach ($relations as $name => $relation): ?>
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
	<?php endforeach; ?>

}
