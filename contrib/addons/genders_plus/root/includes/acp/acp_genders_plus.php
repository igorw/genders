<?php
/**
*
* @package acp
* @version $Id: acp_genders_plus.php 47 2008-03-17 17:40:11Z evil3 $
* @copyright (c) http://www.morphorum.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package acp
*/
class acp_genders_plus
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $gp_config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		$user->add_lang('acp/common');
		$this->tpl_name = 'acp_genders_plus';
		$this->page_title = $user->lang['GENDERS_PLUS_TITLE'];
		add_form_key('acp_genders_plus');

		include($phpbb_root_path . 'includes/functions_genders_plus.' . $phpEx);
		$gp_config = get_gp_config();

		if (isset($_POST['submit']))
		{
			if (!check_form_key('acp_genders_plus'))
			{
				trigger_error('FORM_INVALID');
			}

			$data = array(
				'genders_enabled'	=> request_var('genders_plus_enabled', 0),
				'show_on_reg'		=> request_var('genders_plus_on_registration', 0),
				'mandatory'			=> request_var('genders_plus_mandatory', 0),
				'gendersearch'		=> request_var('genders_plus_gendersearch', 0),
			);

			foreach($data as $key => $value)
			{
				set_gp_config($key, $value);
			}

			$cache->purge();
			trigger_error($user->lang['GENDERS_PLUS_CONFIG_SAVED'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'S_GENDERS_ENABLED'			=> $gp_config['genders_enabled'],
			'S_GENDERS_ONREG'			=> $gp_config['show_on_reg'],
			'S_GENDERS_MANDATORY'		=> $gp_config['mandatory'],
			'S_GENDERS_GENDERSEARCH'	=> $gp_config['gendersearch'],
			'U_ACTION'					=> $this->u_action,
		));
	}
}

?>