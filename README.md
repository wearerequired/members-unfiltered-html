
# Members: Unfiltered HTML capability

WordPress mu-plugin which allows to add the `unfiltered_html` capability to a role in a multisite install via [Members](https://wordpress.org/plugins/members/).

## Installation

Example of a `composer.json` for a site:

```json
{
  "name": "wearerequired/something",
  "description": "required.com",
  "license": "GPL-2.0-or-later",
  "authors": [
    {
      "name": "required gmbh",
      "email": "info@required.ch"
    }
  ],
  "require": {
    "php": ">=5.6",
    "koodimonni/composer-dropin-installer": "dev-master",
    "johnpbloch/wordpress": "~4.9",
    "wpackagist-plugin/members": "^2.0",
    "wearerequired/members-unfiltered-html": "^1.0"
  },
  "extra": {
    "wordpress-install-dir": "wordpress/wp",
    "installer-paths": {
      "wordpress/content/plugins/{$name}/": [
        "type:wordpress-plugin"
      ],
      "vendor/{$vendor}/{$name}/": [
        "type:wordpress-muplugin"
      ],
      "wordpress/content/themes/{$name}/": [
        "type:wordpress-theme"
      ]
    },
    "dropin-paths": {
      "wordpress/content/mu-plugins/": [
        "type:wordpress-muplugin"
      ]
    }
  },
  "minimum-stability": "dev",
  "prefer-stable": true
}
```
