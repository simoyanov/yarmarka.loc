<?php
class ModelCatalogIcategory extends Model {
	public function getIcategory($icategory_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "icategory i LEFT JOIN " . DB_PREFIX . "icategory_description id ON (i.icategory_id = id.icategory_id) LEFT JOIN " . DB_PREFIX . "icategory_to_store i2s ON (i.icategory_id = i2s.icategory_id) WHERE i.icategory_id = '" . (int)$icategory_id . "' AND id.language_id = '" . (int)$this->config->get('config_language_id') . "' AND i2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND i.status = '1'");

		return $query->row;
	}



	public function getIcategoryLayoutId($icategory_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "icategory_to_layout WHERE icategory_id = '" . (int)$icategory_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}
	public function getIcategorys($data = array()) {
		if ($data) {
			$sql = "SELECT * FROM " . DB_PREFIX . "icategory i LEFT JOIN " . DB_PREFIX . "icategory_description id ON (i.icategory_id = id.icategory_id) WHERE id.language_id = '" . (int)$this->config->get('config_language_id') . "'";


		if (isset($data['filter_parent']) && !is_null($data['filter_parent'])) {
			$sql .= " AND i.parent_id = '" . (int)$data['filter_parent'] . "'";
		}
		if (isset($data['filter_top']) && !is_null($data['filter_top'])) {
			$sql .= " AND i.bottom = '" . (int)$data['filter_top'] . "'";
		}




			$sort_data = array(
				'id.title',
				'i.sort_order'
			);

			if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
				$sql .= " ORDER BY " . $data['sort'];
			} else {
				$sql .= " ORDER BY i.sort_order";
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
}