
deployer-typo3-deploy
=====================

[![Latest Stable Version](http://img.shields.io/packagist/v/sourcebroker/deployer-typo3-deploy.svg?style=flat)](https://packagist.org/packages/sourcebroker/deployer-typo3-deploy)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](https://packagist.org/packages/sourcebroker/deployer-typo3-deploy)

## What does it do?

This package provides a deploy task for deploying TYPO3 CMS with Deployer (deployer.org).

## Installation

1. Install package with composer:

   ```
   composer require sourcebroker/deployer-typo3-deploy
   ```

2. Put the following lines at the beginning of your `deploy.php`:

   ```php
   require_once(__DIR__ . '/vendor/autoload.php');

   new \SourceBroker\DeployerLoader\Loader([
     ['get' => 'sourcebroker/deployer-typo3-deploy'],
   ]);
   ```

3. Remove the task "deploy" from your `deploy.php`. Otherwise, you will overwrite the deploy task defined in
   `vendor/sourcebroker/deployer-typo3-deploy/deployer/default/deploy/task/deploy.php`.
   Look at [Example of working configuration](#example-of-working-configuration)
   to see how simple a working `deploy.php` file can be.

## Example of working configuration

This is an example of a working configuration for TYPO3 13.
The aim of `sourcebroker/deployer-typo3-deploy` is to have a very slim `deploy.php` file
in order to make it easy to upgrade to future versions of `sourcebroker/deployer-typo3-deploy`.

```php
<?php

namespace Deployer;

require_once('./vendor/autoload.php');

new \SourceBroker\DeployerLoader\Loader([
  ['get' => 'sourcebroker/deployer-typo3-deploy'],
]);

set('repository', 'git@github.com:sourcebrokergit/t3base13.git');

task('deploy:writable')->disable(); // Disable deploy:writable task if httpd user is the same as ssh user.

host('production')
    ->setHostname('vm-dev.example.com')
    ->setRemoteUser('deploy')
    ->set('branch', 'main')
    ->set('bin/php', '/usr/bin/php84')
    ->set('public_urls', ['https://production-t3base13.example.com'])
    ->set('deploy_path', '~/t3base13/production');

host('staging')
    ->setHostname('vm-dev.example.com')
    ->setRemoteUser('deploy')
    ->set('branch', 'develop')
    ->set('bin/php', '/usr/bin/php84')
    ->set('public_urls', ['https://staging-t3base13.example.com'])
    ->set('deploy_path', '~/t3base13/staging');
```

## Changelog

See [CHANGELOG.rst](https://github.com/sourcebroker/deployer-typo3-deploy/blob/main/CHANGELOG.rst)

