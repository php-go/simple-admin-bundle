<?php
/**
 * User: dongww
 * Date: 2014-10-18
 * Time: 14:47
 */

namespace PhpGo\SimpleAdminBundle\Form;

use PhpGo\SimpleAdminBundle\Form\Field\FieldAbstract;

class Form
{
    protected $fields = [];
    /** @var  Config */
    protected $config;
    protected $name;

    public function addField(FieldAbstract $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    public static function createFromConfig($name, Config $config)
    {
        $form = new static();
        $form->setName($name);
        $form->setConfig($config);

        foreach ($form->getConfig()['form'] as $name => $field) {
            $newField = Forms::createField($field['type']);
            $newField->setName($name);

            $options          = [];
            $options['label'] = isset($field['label']) ? $field['label'] : $name;

            if (isset($field['options'])) {
                $options = array_merge($options, $field['options']);
            }

            $newField->setOptions($options);

            $form->addField($newField);
        }

        return $form;
    }

    /**
     * @return FieldAbstract[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        $config = [
            'form'     => $this->config->getConfig()['contents'][$this->name]['form'],
            'validate' => $this->config->getConfig()['contents'][$this->name]['form_validate'],
        ];

        return $config;
    }
}
