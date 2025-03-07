
Changelog
---------

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