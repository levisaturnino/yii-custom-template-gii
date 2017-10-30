<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data'],
                    'layout' => 'default',
                    'id' => 'form-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>',
                    'fieldConfig' => [
                        'template' => '{label} <div class="row"><div class="col-sm-12">{input}{error}{hint}</div></div>',
                    ]
        ]);
    ?>


<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "<div class=\"row\">\n";
            echo"<div class=\"col-sm-5\">\n";
              echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
           echo "</div>\n";
      echo"</div>\n";
     
    }
} ?>
    <div class="form-group">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
