<?php

namespace skayocrafts\social\gitlab\loginproviders;

use Craft;
use dukt\social\base\LoginProvider;

/**
 * GitLab represents the GitLab gateway
 *
 * @author    Skayo
 * @since     1.0
 */
class GitLab extends LoginProvider {
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function getName (): string {
		return 'GitLab';
	}

	/**
	 * @inheritdoc
	 */
	public function getIconUrl () {
		return Craft::$app->assetManager->getPublishedUrl('@skayocrafts/social/gitlab/icon.svg', true);
	}

	/**
	 * @inheritdoc
	 */
	public function getManagerUrl () {
		return $this->getGitlabDomain() . '/profile/applications';
	}


	/**
	 * @inheritDoc
	 */
	public function getOauthProviderConfig(): array
	{
		$config = parent::getOauthProviderConfig();

		if (empty($config['options']['domain'])) {
			$config['options']['domain'] = 'https://gitlab.com';
		}

		return $config;
	}

	/**
	 * @inheritDoc
	 */
	public function getOauthProvider (): \Omines\OAuth2\Client\Provider\Gitlab {
		$config = $this->getOauthProviderConfig();

		return new \Omines\OAuth2\Client\Provider\Gitlab($config['options']);
	}

	/**
	 * @inheritDoc
	 */
	public function getDefaultOauthScope (): array {
		return [
			'read_user',
		];
	}

	/**
	 * @inheritdoc
	 */
	public function getDefaultUserFieldMapping (): array {
		return [
			'id'       => '{{ profile.getId() }}',
			'email'    => '{{ profile.getEmail() }}',
			'username' => '{{ profile.getUsername() }}',
			'photo'    => '{{ profile.getAvatarUrl() }}',
		];
	}

	/**
	 * Return the Gitlab Domain
	 *
	 * @return string
	 */
	public function getGitlabDomain (): string {
		$config = $this->getOauthProviderConfig();

		return $config['options']['domain'];
	}
}
