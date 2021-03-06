<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Prodi;
/* @var $this yii\web\View */
/* @var $model app\models\mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?php $model->isNewRecord==1? $model->jekel='L':$model->jekel; ?>
        <?= $form->field($model, 'jekel')->radioList(array(
            'L'=>'Laki-laki','P'=>'Perempuan'))->label('Jenis Kelamin') ?>
        <?= $form->field($model, 'id_prodi')->dropDownList(
            ArrayHelper::map(Prodi::find()->all(),'id','prodi'),
            ['prompt' => 'Pilih'])->label('Prodi'); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
