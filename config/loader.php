<?php

return [
    [
        'file_phar' => 'recipe/common.php',
    ],
    [
        'package' => 'sourcebroker/deployer-typo3-deploy',
        'conflict' => [
            'package' => [
                'sourcebroker/deployer-typo3-deploy-ci'
            ]
        ]
    ],
];
