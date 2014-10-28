<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 16:08
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

use Symfony\Component\Form\AbstractType;

interface FieldInterface
{
    public function getTypeName();

    public function getDbFieldType();

    public function getOptions();

    /**
     * @return AbstractType
     */
    public static function getType();
}
