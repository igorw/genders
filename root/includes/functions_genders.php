<?php
/**
*
* @package genders
* @copyright (c) 2007, 2008, 2009 evil3
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

class genders
{
	public static $genders = array(
		0 => 'gender_x',
		1 => 'gender_m',
		2 => 'gender_f',
	);

	/**
	 * Get user gender
	 *
	 * @param int $user_gender User's gender
	 * @param bool $use_text Returns text if true or image if false
	 * @return string Gender
	 */
	public static function get($user_gender, $use_text = false)
	{
		global $user, $config;

		$gender = isset(self::$genders[$user_gender]) ? self::$genders[$user_gender] : self::$genders[0];

		return ($use_text) ? $user->lang[strtoupper($gender)] : $user->img('icon_' . $gender, strtoupper($gender));
	}

	public static function select($selected_gender)
	{
		$output = '';

		foreach (self::$genders as $gender)
		{
			$selected = ($gender == $selected_gender) ? ' checked="checked"' : '';
			$output .= "<input type=\"radio\" name=\"gender\" id=\"gender_$gender\" value=\"$gender\"$selected /> <label for=\"gender_$gender\">" . self::get($gender, true) . '</label>';
		}

		return $output;
	}
}
