
Changelog
---------

2.0.0
-----

1) [TASK][BREAKING] Add a task preventing deployment when it runs in CI.
2) [TASK] Configure loader to throw error when `sourcebroker/deployer-typo3-deploy-ci` loaded together.

1.0.0
-----

1) [TASK] Cleanup composer.json.
2) [TASK] Release first stable version.

0.10.0
-----

1) [TASK] Remove loader for ``sourcebroker/deployer-extended``. Dependency itself was removed already in ``v0.8.0``.


0.9.0
-----

1) [TASK][BREAKING] Add TYPO3 tasks descriptions. Make tasks hidden by default. USer acn unhide them if needed.

0.8.0
-----

1) [TASK][BREAKING] Remove additional tasks form ``sourcebroker/deployer-extended``. They should be part of higher level package.
   ``sourcebroker/deployer-typo3-deploy`` should be only solid base for TYPO3 deploy. Remove dependency to ``sourcebroker/deployer-extended``.

0.7.0
-----

1) [TASK] Remove dependency to ``helhum/typo3-console``.

0.6.0
-----

1) [TASK] Remove not used ``set('composer_channel', 2);``. It must be set now explicitly in project deploy.php
    or custom deploy package and ``bin/composer`` override must be explicitly included with loader
    ``'path' => 'vendor/sourcebroker/deployer-extended/includes/composer.php'``
2) [TASK] Fix ``bin/typo3`` not having fallback to ``typo3cms`` when ``$composerConfig['config']['bin-dir']`` is set.

0.5.0
-----

1) [TASK] Bump ``sourcebroker/deployer-extended`` version.

0.4.0
-----

1) [TASK] Remove setting for "user" as it was only for CI type of deploy. Remove not existing "allow_anonymous_stats"
   setting. Optimise conditions for web_path and bin/typo3.
2) [TASK][BREAKING] Remove changing for ``branch`` setting. If needed should be put higher at project/agency package level.
   This is base package that should be compatible with default Deployer settings as much as possible.
3) [TASK][BREAKING] Refactor order of deploy tasks.

0.3.0
-----

1) [TASK][BREAKING] Remove ``writable_mode``, ``default_timeout``, ``keep_releases`` out of standard configuration. Use default values from
   deployer or build you custom package to manage.
2) [TASK] Refactor taking values for ``web_path`` and ``bin/typo3`` from composer.json.

0.2.0
~~~~~

1) [TASK] Drop dependency to ``typo3/cms-core``. Extend dependency to ``helhum/typo3-console``.
2) [TASK] Add support for ``vendor/bin/typo3cms``.
3) [TASK] Bring back ``clear_paths`` as in current ``sourcebroker/deployer-extended-typo3``.

0.1.0
~~~~~

1) [TASK] Remove not needed loader config path. Reads from default ``config/loader.php``.
2) [TASK] Update dependency to ``sourcebroker/deployer-loader``.

0.0.1
~~~~~~

1) Init version.