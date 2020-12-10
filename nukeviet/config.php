<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2020 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Thu, 10 Dec 2020 03:08:29 GMT
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$db_config['dbhost'] = 'localhost';
$db_config['dbport'] = '3306';
$db_config['dbname'] = 'lancuoi';
$db_config['dbsystem'] = 'lancuoi';
$db_config['dbuname'] = 'root';
$db_config['dbpass'] = '';
$db_config['dbtype'] = 'mysql';
$db_config['collation'] = 'utf8mb4_unicode_ci';
$db_config['charset'] = 'utf8mb4';
$db_config['persistent'] = false;
$db_config['prefix'] = 'nv4';

$global_config['site_domain'] = '';
$global_config['name_show'] = 0;
$global_config['idsite'] = 0;
$global_config['sitekey'] = '0e2a4b0fd73c5e2598889d8e1702be86';// Do not change sitekey!
$global_config['hashprefix'] = '{SSHA512}';
$global_config['cached'] = 'files';
$global_config['session_handler'] = 'files';
$global_config['extension_setup'] = 3; // 0: No, 1: Upload, 2: NukeViet Store, 3: Upload + NukeViet Store
// Readmore: https://wiki.nukeviet.vn/nukeviet4:advanced_setting:file_config