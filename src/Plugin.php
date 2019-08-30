<?php

namespace skayocrafts\social\gitlab;

use dukt\social\services\LoginProviders;
use yii\base\Event;

/**
 * Plugin represents the GitLab integration plugin.
 *
 * @author    Skayo
 * @since     1.0
 */
class Plugin extends \craft\base\Plugin {
	/**
	 * @inheritdoc
	 */
	public function init () {
		parent::init();

		Event::on(LoginProviders::class, LoginProviders::EVENT_REGISTER_LOGIN_PROVIDER_TYPES, function ($event) {
			$loginProviderTypes = [
				'skayocrafts\social\gitlab\loginproviders\GitLab',
			];

			$event->loginProviderTypes = array_merge($event->loginProviderTypes, $loginProviderTypes);
		});
	}
}
