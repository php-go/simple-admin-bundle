<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 17:00
 */

namespace PhpGo\SimpleAdminBundle\Form\Field;

use PhpGo\SimpleAdminBundle\Form\Field\Traits\SizeTraits;

class ImagesField extends ArrayField
{
    use SizeTraits;

    public function getTypeName()
    {
        return 'images';
    }
}
