GitLab login provider for Social
=======================

This plugin provides a [GitLab](https://gitlab.com/) integration for [Social 2 for Craft CMS](https://github.com/dukt/social).


## Requirements

This plugin requires Social 2.0.0 or later.


## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require skayocrafts/social-gitlab

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for GitLab.

## Setup

To enable the GitLab login provider, go to Social → Settings → Login Providers, and configure the “GitLab” login provider.

## Self-Hosted GitLab Config

If you have a self-hosted GitLab and want to use it instead of gitlab.com for OAuth,
then you can set the domain in `config/social.php` like this:

```php
<?php

return [
    'loginProviders' => [
        // ... some other config ...
        'gitlab' => [
            // ... some other config ...
            'oauth' => [
            	// ... some other config ...
                'options' => [
                    // ... some other config ...
                    'domain' => 'https://gitlab.example.com'    
                ]
            ],
        ]
    ]
];
```

For more information about the social configuration, [look here](https://docs.dukt.net/social/v2/configuration.html)

## Some additional Information

### Default User Field Mapping

The GitLab login provider defines the following user field mapping by default:

```
[
    'id'       => '{{ profile.getId() }}',
    'email'    => '{{ profile.getEmail() }}',
    'username' => '{{ profile.getUsername() }}',
    'photo'    => '{{ profile.getAvatarUrl() }}',
]
```

You can override and extend the default mapping using the [loginProviders](https://docs.dukt.net/social/v2/configuration.html#loginproviders) config.

### Profile Object

The profile response for the GitLab login provider is a [GitlabResourceOwner](https://github.com/omines/oauth2-gitlab/blob/master/src/Provider/GitlabResourceOwner.php) object.

#### Methods

- `getId()`
- `getName()`
- `getUsername()`
- `getEmail()`
- `getAvatarUrl()`
- `getProfileUrl()`
- `getToken()`
- `isActive()`
- `isAdmin()`
- `isExternal()`
- `toArray()`
- `getDomain()`
- `setDomain()`
- `getApiClient()`
- `get()`
