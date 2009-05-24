<?php
/**
*
* common [English]
*
* @package language
* @version $Id: info_acp_genders_plus.php 47 2008-03-17 17:40:11Z evil3 $
* @copyright (c) 2008 http://www.morphorum.com
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'GENDERS_PLUS_TITLE'			=> 'Genders+',
	'GENDERS_PLUS_STATUS' 			=> 'Status',
	'GENDERS_PLUS_STATUS_EXP' 		=> 'Enable or disable the Genders mod.',
	'GENDERS_PLUS_ON_REG' 			=> 'Registration page',
	'GENDERS_PLUS_ON_REG_EXP' 		=> 'Show the gender selection on the registration page.',
	'GENDERS_PLUS_MANDATORY' 		=> 'Mandatory',
	'GENDERS_PLUS_MANDATORY_EXP'	=> 'Force users to select a gender.',
	'GENDERS_PLUS_MEMBERLIST' 		=> 'Gendersearch',
	'GENDERS_PLUS_MEMBERLIST_EXP'	=> 'Show the gender search mask on the memberlist.',
	'GENDERS_PLUS_CONFIG_SAVED' 	=> 'Genders+ configuration saved!',
));

?>