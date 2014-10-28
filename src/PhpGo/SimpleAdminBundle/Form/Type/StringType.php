<?php
/**
 * User: dongww
 * Date: 2014-10-21
 * Time: 14:26
 */

namespace PhpGo\SimpleAdminBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class StringType extends TextType
{
    public function getName()
    {
        return 'string';
    }
}
