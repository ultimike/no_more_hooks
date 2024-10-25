<?php

declare(strict_types=1);

namespace Drupal\no_more_hooks\Hook;

use Drupal\Core\Hook\Attribute\Hook;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\user\UserInterface;

/**
 * User-related hooks.
 */
class UserHooks {
  use StringTranslationTrait;

  /**
   * The constructor.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The Drupal core messenger service.
   */
  public function __construct(
    protected MessengerInterface $messenger,
  ) {}

  /**
   * Modern implementation of hook_user_login!
   *
   * @param \Drupal\user\UserInterface $account
   *   The user account for the user logging in.
   */
  #[Hook('user_login')]
  public function myCustomMethodName(UserInterface $account): void {
    $this->messenger->addMessage($this->t('New OO hooks are working!'));
  }

}
