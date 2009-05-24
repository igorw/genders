<?php
/**
*
* @package phpBB3
* @version $Id: functions_genders_plus.php 47 2008-03-17 17:40:11Z evil3 $
* @copyright (c) 2008 http://www.morphorum.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* Set Genders+ config value. Creates missing config entry.
*/
function set_gp_config($config_name, $config_value)
{
	global $gp_config, $db, $cache;

	if(isset($gp_config[$config_name]) && $gp_config[$config_name] == $config_value)
		return false;

	$sql = 'UPDATE ' . GENDERS_PLUS_CONFIG_TABLE . "
		SET config_value = '" . $db->sql_escape($config_value) . "'
		WHERE config_name = '" . $db->sql_escape($config_name) . "'";
	$db->sql_query($sql);

	if (!$db->sql_affectedrows() && !isset($gp_config[$config_name]))
	{
		$sql = 'INSERT INTO ' . GENDERS_PLUS_CONFIG_TABLE . ' ' . $db->sql_build_array('INSERT', array(
			'config_name'	=> $config_name,
			'config_value'	=> $config_value));
		$db->sql_query($sql);
	}
	$cache->destroy('genders_plus_config');
	$gp_config[$config_name] = $config_value;
}

function get_gp_config()
{
	global $db, $cache;

	if(($gp_config = $cache->get('genders_plus_config')) === false)
	{
		$sql = 'SELECT config_name, config_value
					FROM ' . GENDERS_PLUS_CONFIG_TABLE;
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$gp_config[$row['config_name']] = $row['config_value'];
		}
		$db->sql_freeresult($result);

		$cache->put('genders_plus_config', $gp_config);
		$cache->save();
	}

	return $gp_config;
}

?>