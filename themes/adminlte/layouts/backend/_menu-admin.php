<?php 

use app\models\UserRole;

?>

<?= dmstr\widgets\Menu::widget(
    [
        'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
        'items' => [
            ['label' => 'Halaman Depan', 'icon' => 'circle-o', 'url' => ['site/'], 'template' => '<a href="{url}" target="_blank">{icon} {label}</a>'],
            ['label' => 'MENU NAVIGASI','options' => ['class' => 'header']],
            ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['admin/']],
            ['label' => 'Pendaki', 'icon' => 'blind', 'url' => ['pendaki/']],
            ['label' => 'Gunung', 'icon' => 'tree', 'url' => ['gunung/']],
            ['label' => 'Gunung Jalur', 'icon' => 'map', 'url' => ['gunung-jalur/']],
            ['label' => 'Gunung Jalur Pos', 'icon' => 'map-signs', 'url' => ['gunung-jalur-pos/']],
            ['label' => 'Gunung Kuota', 'icon' => 'calendar', 'url' => ['gunung-kuota/']],
            ['label' => 'Jenis Gunung', 'icon' => 'chain', 'url' => ['jenis-gunung/']],

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
