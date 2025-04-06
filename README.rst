deployer-typo3-deploy
=======================

      .. image:: http://img.shields.io/packagist/v/sourcebroker/deployer-typo3-deploy.svg?style=flat
         :target: https://packagist.org/packages/sourcebroker/deployer-typo3-deploy

      .. image:: https://img.shields.io/badge/license-MIT-blue.svg?style=flat
         :target: https://packagist.org/packages/sourcebroker/deployer-typo3-deploy

.. contents:: :local:

What does it do?
----------------

This package provides deploy task for deploying TYPO3 CMS with deployer (deployer.org).

Installation
------------

1) Install package with composer:
   ::

      composer require sourcebroker/deployer-typo3-deploy

2) Put following lines on the beginning of your deploy.php:
   ::

      require_once(__DIR__ . '/vendor/autoload.php');

      new \SourceBroker\DeployerLoader\Loader([
        ['get' => 'sourcebroker/deployer-typo3-deploy'],
      ]);

3) Remove task "deploy" from your deploy.php. Otherwise you will overwrite deploy task defined in
   ``vendor/sourcebroker/deployer-typo3-deploy/deployer/default/deploy/task/deploy.php``. Look at
   `Example of working configuration`_ to see how simple can be working ``deploy.php`` file.


Example of working configuration
--------------------------------

This is example of working configuration for TYPO3 13. The aim of ``sourcebroker/deployer-typo3-deploy`` is to
have very slim ``deploy.php`` file in order to have nice possibility to upgrade to future versions of
``sourcebroker/deployer-typo3-deploy``.

::

  <?php

  namespace Deployer;

  require_once('./vendor/autoload.php');

  new \SourceBroker\DeployerLoader\Load([
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


Changelog
---------

See https://github.com/sourcebroker/deployer-typo3-deploy/blob/main/CHANGELOG.rst

.. _sourcebroker/deployer-typo3-deploy: https://github.com/sourcebroker/deployer-typo3-deploy
