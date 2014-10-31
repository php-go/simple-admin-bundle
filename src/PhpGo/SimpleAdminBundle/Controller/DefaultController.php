<?php
/**
 * User: dongww
 * Date: 2014-9-23
 * Time: 1:26
 */

namespace PhpGo\SimpleAdminBundle\Controller;

use PhpGo\Framework\Application;
use PhpGo\Framework\Core\BundleAbstract;

class DefaultController
{
    public function indexAction(Application $app, BundleAbstract $bundle  /*, $id*/)
    {
        return $app->render('form.twig', [
            'form' => $app['forms']->get('project')->createView(),
        ]);
    }
}
