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

    // TYPO3 special task: warm up system cache
    'typo3:cache:warmup:system',

    // TYPO3 special task: set up extension with database update schema
    'typo3:extension:setup',

    // Standard Deployer task.
    'deploy:symlink',

    // TYPO3 special task: flush cache for pages.
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
