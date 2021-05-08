<?php
namespace Drupal\publicis_task\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for content_entity_manage_inventory entity.
 *
 * @ingroup publicis_task
 */
class InventoryListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['table'] = parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the inventory list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['id'] = $this->t('Id');
    $header['name'] = $this->t('Title');
    $header['first_name'] = $this->t('Name');
    $header['user_id'] = $this->t('User Id');
    $header['city'] = $this->t('City List');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
		$cityList1 = $entity->get("city")->getValue();
		foreach($cityList1 as $city) {
			$cityName[] = $city[value];
		}
	print	implode(", ",array_values($cityName));
			

		$account = \Drupal\user\Entity\User::load($entity->get("user_id")->getValue()['0']['target_id']);
    $row['id'] = $entity->id();
    $row['name'] = $entity->link();
    $row['first_name'] = $entity->first_name->value;
    $row['user_id'] = $name = $account->getUsername();
    $row['city'] = $name = implode(", ",array_values($cityName));
    return $row + parent::buildRow($entity);
  }

}
