<?php

namespace Deployer;

task('deploy', [

    // Standard Deployer task.
    'deploy:info',

    // Standard Deployer task.
    'deploy:setup',

    // Standard Deployer task.
    'deploy:lock',

    // Standard Deployer task.
    'deploy:release',

    // Standard Deployer task.
    'deploy:update_code',

    // Standard Deployer task.
    'deploy:shared',

    // Standard Deployer task.
    'deploy:writable',

    // Standard Deployer task.
    'deploy:vendors',

    // Standard Deployer task.
    'deploy:clear_paths',

    // deployer-typo3-deploy task.
    'typo3:cache:warmup:system',

    // deployer-typo3-deploy task.
    'typo3:extension:setup',

    // Standard Deployer task.
    'deploy:symlink',

    // deployer-typo3-deploy task.
    'typo3:cache:flush:pages',

    // Standard Deployer task.
    'deploy:unlock',

    // Standard Deployer task.
    'deploy:cleanup',

    // Standard Deployer task.
    'deploy:success',

])->desc('Deploy your TYPO3');

task('dpeloy', ['deploy'])->hidden();
task('dpeloy:unlock', ['deploy:unlock'])->hidden();
after('deploy:failed', 'deploy:unlock');
