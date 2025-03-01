<?php

namespace Deployer;

use Deployer\Exception\RunException;

set('allow_anonymous_stats', false);

set('writable_mode', 'skip');

set('composer_channel', 2);

set('default_timeout', 900);

set('keep_releases', 5);

set('branch_detect_to_deploy', false);

set('log_files', 'var/log/typo3_*.log');

$composerConfig = json_decode(file_get_contents('./composer.json'), true, 512, JSON_THROW_ON_ERROR);

set('web_path', function () use ($composerConfig) {
    if ($composerConfig['extra']['typo3/cms']['web-dir'] ?? false) {
        return rtrim($composerConfig['extra']['typo3/cms']['web-dir'], '/') . '/';
    }

    return 'public/';
});

set('bin/typo3', function () use ($composerConfig) {
    if ($composerConfig['config']['bin-dir'] ?? false) {
        return $composerConfig['config']['bin-dir'] . '/typo3';
    }

    return 'vendor/bin/typo3';
});

set('shared_files', [
    '.env'
]);

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

set('writable_dirs', function () {
    return [
        get('web_path') . 'fileadmin',
        get('web_path') . 'typo3temp',
        'var',
    ];
});

set('clear_paths', [
    '.composer-cache',
    '.ddev',
    '.editorconfig',
    '.envrc',
    '.env.dist',
    '.git',
    '.gitattributes',
    '.githooks',
    '.gitignore',
    '.gitlab-ci.yml',
    '.idea',
    '.php_cs',
    '.php-cs-fixer.php',
    'composer.phar',
    'dynamicReturnTypeMeta.json',
    'phive.xml',
    'phpcs.xml',
    'phpstan-baseline.neon',
    'phpstan.neon',
    'README.md',
    'rector.php',
    'typoscript-lint.yml'
]);

set('user', function () {
    if (getenv('CI') !== false) {
        $commitAuthor = getenv('GITLAB_USER_NAME');
        return $commitAuthor ?: 'ci';
    }

    try {
        return runLocally('git config --get user.name');
    } catch (RunException $exception) {
        try {
            return runLocally('whoami');
        } catch (RunException $exception) {
            return 'no_user';
        }
    }
});
