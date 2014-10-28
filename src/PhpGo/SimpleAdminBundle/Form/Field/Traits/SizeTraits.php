<?php
/**
 * User: dongww
 * Date: 2014-10-17
 * Time: 17:03
 */

namespace PhpGo\SimpleAdminBundle\Form\Field\Traits;

trait SizeTraits
{
    protected $sizes;

    public function setSizes(array $sizeArray = [])
    {
        foreach ($sizeArray as $name => $size) {
            $this->sizes[$name] = [
                'width'  => isset($size[0]) ? $size[0] : null,
                'height' => isset($size[1]) ? $size[1] : null,
            ];
        }
    }
}
