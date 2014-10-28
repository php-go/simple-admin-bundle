<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 16:21
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

use PhpGo\Db\Doctrine\Dbal\Structure\Field\FieldInterface;
use PhpGo\SimpleAdminBundle\Form\Structure\Field\Traits\SizeTraits;

class ImageField extends FieldAbstract
{
    const TYPE = 'string';

    use SizeTraits;

    public function getDbFieldType()
    {
        return FieldInterface::TYPE_STRING;
    }
}
 