<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserRole;
use app\models\Unit1;
use app\models\Unit2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah User', ['create','id_user_role'=>$searchModel->id_user_role], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel User', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?>

    </div>

    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width:50px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            /*[
                'attribute' => 'role',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {
                    return $data->getRole();
                }
            ],*/
            [
                'attribute' => 'username',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'id_user_role',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($data) {
                    return @$data->userRole->nama;
                },
                'filter'=>UserRole::getList()
            ],
            [
                'format'=>'raw',
                'headerOptions' => ['style'=>'text-align:center;width:20px;'],
                'value'=>function($data) {
                    return Html::a('<i class="fa fa-key"></i>',['user/set-password','id'=>$data->id],['data-toggle'=>'tooltip','title'=>'Ganti Password']);
                    }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
