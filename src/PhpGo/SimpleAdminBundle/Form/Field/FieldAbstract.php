<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 16:15
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

abstract class FieldAbstract implements FieldInterface
{
    const TYPE = null;

    protected $name;
    protected $options = [];

    /**
     * @param  array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = (array)$options;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getTypeName()
    {
        return static::TYPE;
    }

    public static function getType()
    {
        return null;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
