<?php 

use app\models\UserRole;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            ['label' => 'Beranda', 'icon' => 'dashboard', 'url' => ['admin/']],

            ['label' => 'SISTEM','options' => ['class' => 'header']],
            [
                'label' => 'User',
                'icon' => 'user',
                'url' => '#',
                'items' => [
                    ['label' => 'Admin', 'icon' => 'circle-o', 'url' => ['user/','id_user_role' => UserRole::ADMIN],],
                ]
            ],
            ['label' => 'Logout','icon' => 'lock', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
        ]
    ]
) ?>   
