<?php
namespace Drupal\publicis_task;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a Inventory entity.
 * @ingroup valuebound_task
 */
interface InventoryInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
?>