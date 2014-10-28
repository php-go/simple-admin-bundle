<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 16:09
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

use PhpGo\Db\Doctrine\Dbal\Structure\Field\FieldInterface;
use PhpGo\SimpleAdminBundle\Form\Type\StringType;

class StringField extends FieldAbstract
{
    const TYPE = 'string';

    public function getDbFieldType()
    {
        return FieldInterface::TYPE_STRING;
    }

    public static function getType()
    {
        return new StringType();
    }
}
