<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Supplier;
use app\models\Jenis;
/* @var $this yii\web\View */
/* @var $model app\models\barang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis')->dropDownList(
            ArrayHelper::map(Jenis::find()->all(),'id','nama_jenis'),
            ['prompt' => 'Pilih'])->label('Jenis Barang'); ?>
        <?= $form->field($model, 'id_supplier')->dropDownList(
            ArrayHelper::map(Supplier::find()->all(),'id','nama_supplier'),
            ['prompt' => 'Pilih'])->label('Supplier'); ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'stok')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
