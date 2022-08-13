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

class Blank_admission_form extends Public_Controller {

	/**
	 * Class Constructor
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('admission');
	}

	/**
	 * Index
	 * @return Void
	 */
	public function index() {
		$admission_types = [];
		foreach(get_options('admission_types', FALSE) as $key => $value) {
			array_push($admission_types, $value);
		}
		$religions = [];
		foreach (get_options('religions', FALSE) as $key => $value) {
			array_push($religions, $value);
		}
		$special_needs = [];
		foreach (get_options('special_needs', FALSE) as $key => $value) {
			array_push($special_needs, $value);
		}
		$this->admission->blank_pdf([
			'admission_types' => $admission_types,
			'religions' => $religions,
			'special_needs' => $special_needs
		]);
	}
}
