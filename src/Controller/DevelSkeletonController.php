<?php

namespace Drupal\devel_skeleton\Controller;

use Drupal\Component\Utility\Timer;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\user\UserInterface;

class DevelSkeletonController extends ControllerBase {

  /**
   * Build.
   */
  public function build() {
    return ['#markup' => ''];
  }

}
