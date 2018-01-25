<?php
/**
 * Created by PhpStorm.
 * User: chenyi
 * Date: 2016/7/2
 * Time: 12:25
 */

return [
    'class' => 'yii\web\View',
    'defaultExtension' => 'html',
    'renderers' => [
        'html' => [
            'class' => 'yii\twig\ViewRenderer',
            'cachePath' => '@runtime/Twig/cache',
            // Array of twig options:
            'options' => [
                'auto_reload' => true,
                'debug'=>true,
            ],
            'lexerOptions' => [
                'tag_comment' => ['{*', '*}'],
                'tag_block' => ['{%', '%}'],
                'tag_variable' => ['{{', '}}']
            ],
            'globals' => ['html' => 'yii\helpers\Html'],
            'uses' => ['yii\bootstrap','yii\grid'],
            'extensions'=>['Twig_Extension_Debug'],
        ],
    ],
];