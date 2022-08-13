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

class M_dashboard extends CI_Model {

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
	 * @return Resource
	 */
	public function widget_box() {
		$query = $this->db->query("
			SELECT (SELECT COUNT(*) FROM comments x1 WHERE x1.comment_type='message') AS messages
			, (SELECT COUNT(*) FROM comments x1 WHERE x1.comment_type='post') AS comments
			, (SELECT COUNT(*) FROM posts x1 WHERE x1.post_type='post') AS posts
			, (SELECT COUNT(*) FROM posts x1 WHERE x1.post_type='page') AS pages
			, (SELECT COUNT(*) FROM categories WHERE category_type='post') AS categories
			, (SELECT COUNT(*) FROM tags) AS tags
			, (SELECT COUNT(*) FROM links WHERE link_type = 'link') AS links
			, (SELECT COUNT(*) FROM quotes) AS quotes
		");
		return $query->row();
	}
}
