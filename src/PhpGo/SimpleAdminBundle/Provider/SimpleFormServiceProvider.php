<?php
/**
 * User: dongww
 * Date: 2014-10-20
 * Time: 15:45
 */

namespace PhpGo\SimpleAdminBundle\Provider;

use PhpGo\SimpleAdminBundle\Form\Field\FieldAbstract;
use PhpGo\SimpleAdminBundle\Form\Forms;
use PhpGo\SimpleAdminBundle\Form\Type\StringType;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SimpleFormServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['simpleform.config.path']       = '';
        $container['simpleform.config.cache_path'] = '';
        $container['simpleform.config.class']      = 'PhpGo\\SimpleAdminBundle\\Form\\Config';
        $container['simpleform.forms.class']       = 'PhpGo\\SimpleAdminBundle\\Form\\Forms';

        $container['simpleform.custom_fields'] = [];
        $container['form.types']               = function () {
            return [
                new StringType(),
            ];
        };

        $container['simpleform.config'] = function (Container $container) {
//            $coreFieldsNamespace = 'PhpGo\\SimpleAdminBundle\\Form\\Field\\';
            $coreFields          = [
                'PhpGo\\SimpleAdminBundle\\Form\\Field\\StringField',
            ];

            Forms::registerFields($coreFields);
            Forms::registerFields($container['simpleform.custom_fields']);

            $container->extend('form.types', function ($types, $container) {
                /** @var FieldAbstract $field */
                foreach ($container['simpleform.custom_fields'] as $field) {
                    if ($type = $field::getType()) {
                        $types[] = $type;
                    }
                }

                return $types;
            });

            $config = $container['simpleform.config.class']::createFromYaml(
                $container['simpleform.config.path']
            );

            return $config;
        };

        $container['forms'] = function ($container) {
            /** @var Forms $forms */
            $forms = new $container['simpleform.forms.class'](
                $container['simpleform.config'],
                $container['form.factory']
            );


            return $forms;
        };
    }
}
 