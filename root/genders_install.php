<?php
/**
*
* @package genders
* @copyright (c) 2009 evil3 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// We only allow a founder to install this MOD
if ($user->data['user_type'] != USER_FOUNDER)
{
	if ($user->data['user_id'] == ANONYMOUS)
	{
		login_box('', 'LOGIN');
	}

	trigger_error('NOT_AUTHORISED');
}

if (!class_exists('umil'))
{
	include($phpbb_root_path . 'umil/umil.' . $phpEx);
}

$umil = new umil(true);

$mod = array(
	'name'		=> 'Genders',
	'version'	=> '1.0.2',
	'config'	=> 'genders_version',
	'enable'	=> 'genders_enable',
);

if (confirm_box(true))
{
	// Install the base 1.0.2 version
	if (!$umil->config_exists($mod['config']))
	{
		// Lets add a config setting for enabling/disabling the MOD and set it to true
		$umil->config_add($mod['enable'], true);

		// We must handle the version number ourselves.
		$umil->config_add($mod['config'], $mod['version']);

		$umil->table_column_add('USERS_TABLE', 'user_gender', array('TINT:1', 0));
	}

	// We are done
	trigger_error('Done!');
}
else
{
	confirm_box(false, 'INSTALL_TEST_MOD');
}

// Shouldn't get here.
redirect($phpbb_root_path . $user->page['page_name']);
