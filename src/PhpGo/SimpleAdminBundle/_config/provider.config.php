<?php
use PhpGo\SimpleAdminBundle\Provider\SimpleFormServiceProvider;

$app->register(new SimpleFormServiceProvider(), [
    'simpleform.config.path' => __DIR__ . '/admin.config.yml',
]);