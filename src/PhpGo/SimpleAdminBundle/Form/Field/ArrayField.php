<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 17:05
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

use PhpGo\Db\Doctrine\Dbal\Structure\Field\FieldInterface;

class ArrayField extends FieldAbstract
{
    public function getTypeName()
    {
        return 'array';
    }

    public function getDbFieldType()
    {
        return FieldInterface::TYPE_ARRAY;
    }
}
