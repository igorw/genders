<?php
/**
*
* @package acp
* @version $Id: acp_genders_plus.php 46 2008-03-17 14:05:40Z morpha $
* @copyright (c) 2008 http://www.morphorum.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package module_install
*/
class acp_genders_plus_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_genders_plus',
			'title'		=> 'GENDERS_PLUS_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'main'	=> array(
					'title'			=> 'GENDERS_PLUS_GENERAL',
					'auth'			=> 'acl_a_user',
					'cat'			=> array('ACP_CAT_USERS'),
				),
			),
		);
	}
}

?>