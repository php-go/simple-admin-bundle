<?php
/**
 * User: dongww
 * Date: 2014-10-20
 * Time: 13:19
 */

namespace PhpGo\SimpleAdminBundle\Form;

use PhpGo\Db\Doctrine\Dbal\Manager\Bean;
use PhpGo\SimpleAdminBundle\Form\Field\FieldAbstract;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Form\FormFactoryInterface;

class Forms// extends Container
{
    protected $forms = [];
    protected $factory;
    protected $config;
    protected static $fieldTypes;
//    public function __construct(array $values = [])
//    {
//        parent::__construct();
//
//        foreach ($values as $key => $value) {
//            $this[$key] = $value;
//        }
//    }

    public function __construct(Config $config, FormFactoryInterface $factory)
    {
        $this->factory = $factory;
        $this->config  = $config;
    }

    /**
     * @param      $formName
     * @param Bean $data
     * @return \Symfony\Component\Form\Form
     * @throws \Exception
     */
    public function get($formName, Bean $data = null)
    {
        if (!isset($this->forms[$formName])) {
            $form        = $this->config->getForm($formName);
            $formBuilder = $this->factory->createBuilder('form', $data);

            foreach ($form->getFields() as $fieldName => $field) {
                $formBuilder->add($fieldName, $field->getTypeName(), $field->getOptions());
            }

            $this->forms[$formName] = $formBuilder->getForm();
        }

        return $this->forms[$formName];
    }

    public function createView($formName)
    {
        return $this->get($formName)->createView();
    }

    public static function registerField($fieldTypeClass)
    {
        static::$fieldTypes[$fieldTypeClass::TYPE] = $fieldTypeClass;
    }

    public static function registerFields(array $fieldTypeClasses)
    {
        foreach ($fieldTypeClasses as $class) {
            static::registerField($class);
        }
    }

    /**
     * @param $typeName
     * @return FieldAbstract
     */
    public static function createField($typeName)
    {
        return new static::$fieldTypes[$typeName]();
    }
}
