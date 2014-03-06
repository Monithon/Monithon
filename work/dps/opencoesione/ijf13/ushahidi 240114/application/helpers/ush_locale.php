<?php
/**
 * Locale helper
 *
 * @package    Ush_Locale
 * @author     Ushahidi Team
 * @copyright  (c) 2008 Ushahidi Team
 * @license    http://www.ushahidi.com/license.html
 */
class ush_locale_Core
{
	/**
	 * @param   string	 ISO-639 language code
	 */
	public static function language($iso639)
	{
		$iso_array = array (
			
			"en" => "English",
			"it" => "Italiano",

		);

		if (array_key_exists($iso639, $iso_array))
		{
			return $iso_array[$iso639];
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Is a language written Right-to-left
	 * @param $locale
	 */
	public static function is_rtl_language($locale = NULL)
	{
		// Check for text direction override
		if (Kohana::config('locale.force_text_direction') == 'rtl') return TRUE;
		if (Kohana::config('locale.force_text_direction') == 'ltr') return FALSE;

		// Check for special translation string 'ui_main.text_direction'
		if (Kohana::lang('core.text_direction', $locale) == 'rtl') return TRUE;

		return FALSE;
	}

	/**
	 * @param   string	 ISO-3166 country code
	 */
	public static function country($iso3166)
	{
		$iso_array = array(

			"IT" => "Italy",
			"US" => "United States",
		);

		if (array_key_exists($iso3166, $iso_array))
		{
			return $iso_array[$iso3166];
		}
		else
		{
			return Kohana::lang('ui_admin.unknown');
		}
	}

	/**
	 * checks the i18n folder to see what folders we have available
	 * @param boolean Force reloading locale cache
	 */
	public static function get_i18n($refresh = FALSE)
	{
		// If we had cached locales return those
		if (! $refresh)
		{
			$locales = Cache::instance()->get('locales');
			if ( $locales )
			{
				return $locales;
			}
		}

		$locales = array();

		// i18n path
		$i18n_path = APPPATH.'i18n/';

		// i18n folder
		$i18n_folder = @ opendir($i18n_path);

		if ( !$i18n_folder )
			return false;

		while ( ($i18n_dir = readdir($i18n_folder)) !== false )
		{
			if ( is_dir($i18n_path.$i18n_dir) && is_readable($i18n_path.$i18n_dir) )
			{
				// Strip out .  and .. and any other stuff
				if ( $i18n_dir{0} == '.' || $i18n_dir == '..'
				 	|| $i18n_dir ==  '.DS_Store' || $i18n_dir == '.git')
					continue;

				$locale = explode("_", $i18n_dir);
				if ( count($locale) < 2 AND ! ush_locale::language($locale[0]))
					continue;

				$locales[$i18n_dir] = ush_locale::language($locale[0]) ? ush_locale::language($locale[0]) : $locale[0];
				$locales[$i18n_dir] .= isset($locale[1]) ? " (".$locale[1].")" : "";
			}
		}

		if ( is_dir( $i18n_dir ) )
			@closedir( $i18n_dir );

		Cache::instance()->set('locales', $locales, array('locales'), 604800);

		return $locales;
	}
	
	/**
	 * Detect language from GET param, session or settings.
	 */
		 public static function detect_language()
	{
		// Locale form submitted?
		if (isset($_GET['l']) && !empty($_GET['l']))
		{
			Session::instance()->set('locale', $_GET['l']);
		}

		// Has a locale session been set?
		if (Session::instance()->get('locale',FALSE))
		{
			// Change current locale
			Kohana::config_set('locale.language', $_SESSION['locale']);
		}
	}
}
