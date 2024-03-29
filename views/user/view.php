<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Detail User";
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-danger">

    <div class="box-header">
        <h3 class="box-title">Detail User</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'role',
                'format' => 'raw',
                'value' => @$model->userRole->nama
            ],
            [
                'attribute' => 'username',
                'format' => 'raw',
                'value' => $model->username
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => $model->labelStatus
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->updated_at),
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting User', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar User', ['index','id_user_role' => $model->id_user_role], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
