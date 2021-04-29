<?php

namespace Drupal\module_test\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

/**
 * Description of PageJsonController
 *
 * @author kana
 */
class PageJsonController extends ControllerBase {

    public function pageJson($first, $second) {
        
        $site_config = $this->config('system.site');
        $serializer = \Drupal::service('serializer');
                
        $node = Node::load($second);
        $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
        
        if ($site_config->get('siteapikey') == $first) {
            return new JsonResponse($data);
            
        } else {
        return [ '#markup' => "Access Denied"];
        }
    }

}
