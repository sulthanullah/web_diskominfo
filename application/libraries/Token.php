<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CMSku | CMS (Content Management System) Gratis
 * untuk dikembangkan
 * @version    2.4.9
 * @author     Karya Anak  Bangsa
 * @copyright  (c) 2014-2020
 * @link    Karya Anak  Bangsa
 *
 * PERINGATAN :
 * 1. TIDAK DIPERKENANKAN MENGGUNAKAN CMS INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 2. TIDAK DIPERKENANKAN MEMPERJUALBELIKAN APLIKASI INI TANPA SEIZIN DARI PIHAK PENGEMBANG APLIKASI.
 * 3. TIDAK DIPERKENANKAN MENGHAPUS KODE SUMBER APLIKASI.
 */

class Token {

	/**
	 * Reference to CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	/**
	 * @var token
	 * @access private
	 */
	private $token;

	/**
	 * @var old token
	 * @access private
	 */
	private $old_token;

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		$this->CI = &get_instance();
		if (NULL !== __session('token')) {
			$this->old_token = __session('token');
		}
	}

	/**
	 * Set Token
	 * @return String
	 */
	private function set_token() {
		$ip = $_SERVER['REMOTE_ADDR'];
		$uniqid = uniqid(mt_rand(), true);
		return md5($ip . $uniqid);
	}

	/**
	 * Get Token
	 * @return String
	 */
	public function get_token() {
		$this->token = $this->set_token();
		$this->CI->session->set_userdata('token', $this->token);
		return $this->token;
	}

	/**
	 * Token validated
	 * @return Boolean
	 */
	public function  is_valid_token($token) {
		return $token === $this->old_token;
	}
}
