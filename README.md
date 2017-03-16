
# Members: Unfiltered HTML capability

WordPress mu-plugin which allows to add the `unfiltered_html` capability to a role in a multisite install via [Members](https://wordpress.org/plugins/members/).

## Installation

Example of a `composer.json` for a site:

```json
{
  "name": "wearerequired/something",
  "license": "GPL-2.0+",
  "authors": [
    {
      "name": "required gmbh",
      "email": "info@required.ch"
    }
  ],
  "require": {
    "php": ">=5.6",
    "koodimonni/composer-dropin-installer": "dev-master",
    "johnpbloch/wordpress": "~4.7",
    "wearerequired/members-unfiltered-html": "dev-master"
  },
  "repositories": [
    {
      "type": "git",
      "url": "git@github.com:wearerequired/members-unfiltered-html.git"
    }
  ],
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
