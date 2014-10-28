<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 16:06
 */

namespace PhpGo\SimpleAdminBundle\Form;

use PhpGo\SimpleAdminBundle\Form\Field\FieldTypeInterface;
use PhpGo\SimpleAdminBundle\Form\Field\ImageField;
use PhpGo\SimpleAdminBundle\Form\Field\RelationField;
use PhpGo\SimpleAdminBundle\Form\Field\StringField;
use Symfony\Component\Yaml\Yaml;

class Config
{
    protected $config;
    /** @var  Form[] */
    protected $forms;

    protected function __construct(array $config)
    {
        $this->config = $config;
        $this->handleData();
    }

    private static function createFromArray(array $config)
    {
        return new static($config);
    }

    public static function createFromYaml($filename)
    {
        $config = Yaml::parse($filename);

        return static::createFromArray($config);
    }

    protected function handleData()
    {
        foreach ($this->config['contents'] as $name => $form) {
            $this->addForm(Form::createFromConfig($name, $this));
        }
    }

    /**
     * @return Form[]
     */
    public function getForms()
    {
        return $this->forms;
    }

    public function getForm($name)
    {
        if (!isset($this->forms[$name])) {
            throw new \Exception("不存在 $name 表单");
        }

        return $this->forms[$name];
    }

    public function addForm(Form $form)
    {
        $this->forms[$form->getName()] = $form;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
