<?php

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use Yii;
use \<?= $generator->ns ?>\base\<?= $className ?> as Base<?= $className ?>;

/** Table Relation **/
<?php foreach($behavior as $FK){?>
use <?= $FK['used']. ";\n";?>
<?php }?>

/**
 * This is the model class for table "<?= $tableName ?>".
 */
class <?= $className ?> extends Base<?= $className . "\n" ?>
{
    
	
	public function behaviors()
	{
		return [
			[
				
				'class' => 'mdm\converter\RelatedConverter',
				'attributes' => [
				<?php foreach($behavior as $FK){?>
					<?= $FK['behav']. ",\n";?>
				<?php }?>
				],
			],
		];
	}
	
	<?php foreach ($relations as $name => $relation): ?>
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
	<?php endforeach; ?>

}
