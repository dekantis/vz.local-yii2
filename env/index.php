<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
 * return [
 *     'environment name' => [
 *         'path' => 'directory storing the local files',
 *         'skipFiles'  => [
 *             // list of files that should only copied once and skipped if they already exist
 *         ],
 *         'setWritable' => [
 *             // list of directories that should be set writable
 *         ],
 *         'setExecutable' => [
 *             // list of files that should be set executable
 *         ],
 *         'setCookieValidationKey' => [
 *             // list of config files that need to be inserted with automatically generated cookie validation keys
 *         ],
 *         'createSymlink' => [
 *             // list of symlinks to be created. Keys are symlinks, and values are the targets.
 *         ],
 *     ],
 * ];
 * ```
 */

$web = [
    // fronted
    'web/index.php' => 'frontend/web/index.php',
    'web/favicon.ico' => 'frontend/web/favicon.ico',
    'web/assets' => 'frontend/web/assets',
    'web/img' => 'frontend/web/img',
    // backend
    'web/admin/index.php' => 'backend/web/index.php',
    'web/admin/favicon.ico' => 'backend/web/favicon.ico',
    'web/admin/assets' => 'backend/web/assets',
    'web/admin/css' => 'backend/web/css',
    //storage
    'web/storage' => 'storage'
];

return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
        ],
        'setExecutable' => [
            'yii',
            'yii_test',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
        ],
        'relativeSymlink' => true,
        'createSymlinks' => $web,
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
        ],
        'relativeSymlink' => true,
        'createSymlinks' => $web,
    ],
];
