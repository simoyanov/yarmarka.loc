<?php
class ModelCatalogIcategory extends Model {
	public function addIcategory($data) {

		$this->event->trigger('pre.admin.icategory.add', $data);

		$this->db->query("INSERT INTO " . DB_PREFIX . "icategory SET 
			parent_id = '" . (int)$data['parent_id'] . "', 
			sort_order = '" . (int)$data['sort_order'] . "', 
			bottom = '" . (isset($data['bottom']) ? (int)$data['bottom'] : 0) . "', 
			image = '" . $this->db->escape($data['image']) . "',
			status = '" . (int)$data['status'] . "'");

		$icategory_id = $this->db->getLastId();

		foreach ($data['icategory_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_description SET icategory_id = '" . (int)$icategory_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		if (isset($data['icategory_store'])) {
			foreach ($data['icategory_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_to_store SET icategory_id = '" . (int)$icategory_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		if (isset($data['icategory_layout'])) {
			foreach ($data['icategory_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_to_layout SET icategory_id = '" . (int)$icategory_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}

		if (isset($data['keyword'])) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'icategory_id=" . (int)$icategory_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		$this->cache->delete('icategory');

		$this->event->trigger('post.admin.icategory.add', $icategory_id);

		return $icategory_id;
	}

	public function editIcategory($icategory_id, $data) {
		
		$this->event->trigger('pre.admin.icategory.edit', $data);

		$this->db->query("UPDATE " . DB_PREFIX . "icategory SET 
			parent_id = '" . (int)$data['parent_id'] . "', 
			sort_order = '" . (int)$data['sort_order'] . "', 
			bottom = '" . (isset($data['bottom']) ? (int)$data['bottom'] : 0) . "', 
			image = '" . $this->db->escape($data['image']) . "',
			status = '" . (int)$data['status'] . "' 
			WHERE icategory_id = '" . (int)$icategory_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_description WHERE icategory_id = '" . (int)$icategory_id . "'");

		foreach ($data['icategory_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_description SET icategory_id = '" . (int)$icategory_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', description = '" . $this->db->escape($value['description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_to_store WHERE icategory_id = '" . (int)$icategory_id . "'");

		if (isset($data['icategory_store'])) {
			foreach ($data['icategory_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_to_store SET icategory_id = '" . (int)$icategory_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_to_layout WHERE icategory_id = '" . (int)$icategory_id . "'");

		if (isset($data['icategory_layout'])) {
			foreach ($data['icategory_layout'] as $store_id => $layout_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "icategory_to_layout SET icategory_id = '" . (int)$icategory_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'icategory_id=" . (int)$icategory_id . "'");

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'icategory_id=" . (int)$icategory_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		$this->cache->delete('icategory');

		$this->event->trigger('post.admin.icategory.edit', $icategory_id);
	}

	public function deleteIcategory($icategory_id) {
		$this->event->trigger('pre.admin.icategory.delete', $icategory_id);

		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory WHERE icategory_id = '" . (int)$icategory_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_description WHERE icategory_id = '" . (int)$icategory_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_to_store WHERE icategory_id = '" . (int)$icategory_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "icategory_to_layout WHERE icategory_id = '" . (int)$icategory_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'icategory_id=" . (int)$icategory_id . "'");

		$this->cache->delete('icategory');

		$this->event->trigger('post.admin.icategory.delete', $icategory_id);
	}

	public function getIcategory($icategory_id) {
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'icategory_id=" . (int)$icategory_id . "') AS keyword FROM " . DB_PREFIX . "icategory WHERE icategory_id = '" . (int)$icategory_id . "'");

		return $query->row;
	}

	public function getIcategorys($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "icategory i LEFT JOIN " . DB_PREFIX . "icategory_description id ON (i.icategory_id = id.icategory_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "'";

			$sort_data = array(
				'id.title',
				'i.sort_order'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY id.title";
			}

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}

			if (isset($data['start']) || isset($data['limit'])) {
				if ($data['start'] < 0) {
					$data['start'] = 0;
				}

				if ($data['limit'] < 1) {
					$data['limit'] = 20;
				}

				$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
			}

			$query = $this->db->query($sql);

			return $query->rows;
		} else {
			$icategory_data = $this->cache->get('icategory.' . (int)$this->config->get('config_language_id'));

			if (!$icategory_data) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "icategory i LEFT JOIN " . DB_PREFIX . "icategory_description id ON (i.icategory_id = id.icategory_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY id.title");

				$icategory_data = $query->rows;

				$this->cache->set('icategory.' . (int)$this->config->get('config_language_id'), $icategory_data);
			}

			return $icategory_data;
		}
	}

	public function getIcategoryDescriptions($icategory_id) {
		$icategory_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "icategory_description WHERE icategory_id = '" . (int)$icategory_id . "'");

		foreach ($query->rows as $result) {
			$icategory_description_data[$result['language_id']] = array(
				'title'            => $result['title'],
				'description'      => $result['description'],
				'meta_title'       => $result['meta_title'],
				'meta_description' => $result['meta_description'],
				'meta_keyword'     => $result['meta_keyword']
			);
		}

		return $icategory_description_data;
	}

	public function getIcategoryStores($icategory_id) {
		$icategory_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "icategory_to_store WHERE icategory_id = '" . (int)$icategory_id . "'");

		foreach ($query->rows as $result) {
			$icategory_store_data[] = $result['store_id'];
		}

		return $icategory_store_data;
	}

	public function getIcategoryLayouts($icategory_id) {
		$icategory_layout_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "icategory_to_layout WHERE icategory_id = '" . (int)$icategory_id . "'");

		foreach ($query->rows as $result) {
			$icategory_layout_data[$result['store_id']] = $result['layout_id'];
		}

		return $icategory_layout_data;
	}

	public function getTotalIcategorys() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "icategory");

		return $query->row['total'];
	}

	public function getTotalIcategorysByLayoutId($layout_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "icategory_to_layout WHERE layout_id = '" . (int)$layout_id . "'");

		return $query->row['total'];
	}
}