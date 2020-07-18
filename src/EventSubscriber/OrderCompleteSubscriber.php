<?php

namespace Drupal\donation\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\state_machine\Event\WorkflowTransitionEvent;
use Drupal\Core\Entity\EntityTypeManager;


class OrderCompleteSubscriber implements EventSubscriberInterface
{


  protected $entityTypeManager;


  public function __construct(EntityTypeManager $entity_type_manager)
  {
    $this->entityTypeManager = $entity_type_manager;
  }


  static function getSubscribedEvents()
  {
    $events['commerce_order.place.post_transition'] = ['orderCompleteHandler'];

    return $events;
  }


  public function orderCompleteHandler(WorkflowTransitionEvent $event)
  {
    /** @var \Drupal\commerce_order\Entity\OrderInterface $order */
    $order = $event->getEntity();
    // Order items in the cart.
    $items = $order->getItems();

    var_dump($items);
    exit;
  }
}
