<?php

namespace Drupal\module_test\Routing;


use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;
/**
 * Description of RouteSubscriber
 *
 * @author kana
 */
class RouteSubscriber extends RouteSubscriberBase {
    
    protected function alterRoutes(RouteCollection $collection) {
     
        if($route = $collection->get('system.site_information_settings')){
            
            $route->setDefault('_form', 'Drupal\module_test\Form\ExtendedSiteInformationForm');
        }
    }

}
