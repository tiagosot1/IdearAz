<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Play_Encryption extends CI_Encryption
{
	protected $config = array('key' => 'T83c8Dd3dt');
	public function __construct()
	{
		parent::__construct();
	}

	public function encode_url($text){
		//$config = array('key' => , );
		$text_encode = $this->encrypt($text);
		$text_encode = strtr(
                $text_encode,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
		return $text_encode;
	}

	public function decode_url($text){
		$text = strtr(
            $text,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
		$text_decode = $this->decrypt($text);

		return $text_decode;
	}
}