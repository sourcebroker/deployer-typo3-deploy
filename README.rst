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


   Its advisable that you put ``alias dep="vendor/bin/dep"`` in your ``~/.profile`` to be able to run deployer
   with regular ``dep`` command. Otherwise you will need to run deployer like this ``./vendor/bin/dep ...``

2) Put following lines on the beginning of your deploy.php:
   ::

      require_once(__DIR__ . '/vendor/autoload.php');
      new \SourceBroker\DeployerLoader\Loader([
        ['get' => 'sourcebroker/deployer-typo3-deploy'],
      ]);

3) Remove task "deploy" from your deploy.php. Otherwise you will overwrite deploy task defined in
   ``vendor/sourcebroker/deployer-typo3-deploy/deployer/default/deploy/task/deploy.php``. Look at
   `Example of working configuration`_ to see how simple can be working ``deploy.php`` file.

   If you want to update language files on each deploy add task ``typo3:language:update`` before ``deploy_symlink``.
   Read https://github.com/sourcebroker/deployer-extended-typo3/discussions/14 to see why updating language labels on
   each deploy is very arguable and generally not advised.
   ::

      before('deploy_symlink', 'typo3:language:update');


Deployment
----------

Run:
::

   dep deploy [host]


Shared dirs
+++++++++++

For TYPO3 13 the shared dirs are:
::

  set('shared_dirs', function () {
      return [
        get('web_path') . 'fileadmin',
        get('web_path') . 'typo3temp/assets/_processed_',
        get('web_path') . 'typo3temp/assets/images',
        'var/charset',
        'var/lock',
        'var/log',
        'var/session',
      ];
  });


Shared files
++++++++++++

The shared file for TYPO3 13 is:
::

   set('shared_files', ['.env']);


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

  host('production')
      ->setHostname('vm-dev.example.com')
      ->setRemoteUser('deploy')
      ->set('branch', 'master')
      ->set('bin/php', '/usr/bin/php82')
      ->set('public_urls', ['https://production-t3base13.example.com'])
      ->set('deploy_path', '/home/www/t3base13/production');

  host('staging')
      ->setHostname('vm-dev.example.com')
      ->setRemoteUser('deploy')
      ->set('branch', 'master')
      ->set('bin/php', '/usr/bin/php82')
      ->set('public_urls', ['https://staging-t3base13.example.com'])
      ->set('deploy_path', '/home/www/t3base13/staging');


Changelog
---------

See https://github.com/sourcebroker/deployer-typo3-deploy/blob/master/CHANGELOG.rst


.. _sourcebroker/deployer-extended: https://github.com/sourcebroker/deployer-extended
.. _sourcebroker/deployer-typo3-deploy: https://github.com/sourcebroker/deployer-typo3-deploy
