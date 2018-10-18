<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('url_title'))
{

    /**
                 * Create URL Title

                 *

                 * Takes a "title" string as input and creates a

                 * human-friendly URL string with either a dash

                 * or an underscore as the word separator.

                 *

                 * @access    public

                 * @param     string    the string

                 * @param     string    the separator: dash, or underscore

                 * @return    string

                */

                function url_title($str, $separator = 'dash')

    {

        if ($separator == 'dash')

        {

            $search     = '_';

            $replace    = '-';

        }

        else

        {

            $search     = '-';

            $replace    = '_';

        }

        

        $str = convert_accented_characters($str);

        

        $trans = array(

                        $search                                => $replace,

                        "\s+"                                => $replace,

                        "[^a-z0-9".$replace."]"                => '',

                        $replace."+"                        => $replace,

                        $replace."$"                        => '',

                        "^".$replace                        => ''

                       );

 

        $str = strip_tags(strtolower($str));

    

        foreach ($trans as $key => $val)

        {

            $str = preg_replace("#".$key."#", $val, $str);

        }

 

                               return trim(stripslashes($str));

    }

}

function convert_accented_characters($var, $enc = 'UTF-8')
{
	$acentos = array(
			   'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
			   'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
			   'C' => '/&Ccedil;/',
			   'c' => '/&ccedil;/',
			   'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
			   'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
			   'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
			   'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
			   'N' => '/&Ntilde;/',
			   'n' => '/&ntilde;/',
			   'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
			   'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
			   'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
			   'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
			   'Y' => '/&Yacute;/',
			   'y' => '/&yacute;|&yuml;/',
			   'o.' => '/&ordm;/'
		);
   $var = preg_replace($acentos, array_keys($acentos), htmlentities($var, ENT_NOQUOTES, $enc) );
   return $var;
}
/* End of file MY_url_helper.php */
/* Location: ./system/appication/helpers/MY_url_helper.php */