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

class M_post_categories extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'categories';

	/**
	 * Class Constructor
	 *
	 * @return Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get Data
	 * @param String $keyword
	 * @param String $return_type
	 * @param Integer $limit
	 * @param Integer $offset
	 * @return Resource
	 */
	public function get_where($keyword = '', $return_type = 'count', $limit = 0, $offset = 0) {
		$this->db->select('id, category_name, category_description, category_slug, is_deleted');
		$this->db->where('category_type', 'post');
		if ( ! empty($keyword) ) {
			$this->db->group_start();
			$this->db->like('category_name', $keyword);
			$this->db->or_like('category_description', $keyword);
			$this->db->or_like('category_slug', $keyword);
			$this->db->group_end();
		}
		if ( $return_type == 'count' ) return $this->db->count_all_results(self::$table);
		if ( $limit > 0 ) $this->db->limit($limit, $offset);
		return $this->db->get(self::$table);
	}

	/**
	 * Dropdown
	 * @return Array
	 */
	public function dropdown() {
		$this->db->select('id, category_name');
		$this->db->where('category_type', 'post');
		$this->db->order_by('category_name', 'ASC');
		$query = $this->db->get(self::$table);
		$dataset = [];
		foreach($query->result() as $row) {
			$dataset[$row->id] = $row->category_name;
		}
		return $dataset;
	}

	/**
	 * custom Save
	 * @param Array
	 * @return Integer
	 */
	public function save($dataset) {
		$query = $this->db->insert(self::$table, $dataset);
		return $query ? $this->db->insert_id() : 0;
	}
}
