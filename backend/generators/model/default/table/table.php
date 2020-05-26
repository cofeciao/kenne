<?php
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $properties array list of properties (property => [type, name. comment]) */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>\table;

use cheatsheet\Time;
use modava\article\models\query\<?= $className ?>Query;
use Yii;
use yii\db\ActiveRecord;

class <?= $className ?>Table extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
<?php if (isset($tableSchema->columns['status'])) { ?>
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

<?php } ?>
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }

    public static function find()
    {
        return new <?= $className ?>Query(get_called_class());
    }

    public function afterDelete()
    {
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
