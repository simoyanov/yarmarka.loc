<?php
class ModelLocalisationPromocode extends Model {
	public function addPromocode($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "promocode SET 
			status = '" . (int)$data['status'] . "', 
			name = '" . $this->db->escape($data['name']) . "', 
			code = '" . $this->db->escape($data['code']) . "', 
			country_id = '" . (int)$data['country_id'] . "'
		");

		$this->cache->delete('promocode');
	}

	public function editPromocode($customer_promocode_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "promocode SET 
			status = '" . (int)$data['status'] . "', 
			name = '" . $this->db->escape($data['name']) . "', 
			code = '" . $this->db->escape($data['code']) . "', 
			country_id = '" . (int)$data['country_id'] . "' 
			WHERE customer_promocode_id = '" . (int)$customer_promocode_id . "'");

		$this->cache->delete('promocode');
	}

	public function deletePromocode($promocode_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "promocode WHERE promocode_id = '" . (int)$promocode_id . "'");

		$this->cache->delete('promocode');
	}

	public function getPromocode($promocode_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "promocode WHERE promocode_id = '" . (int)$promocode_id . "'");

		return $query->row;
	}

	public function getPromocodes($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "customer_to_promocode";

		$sort_data = array(
			'customer_id',
			'place_id',
			'z.code'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY customer_id";
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
	}
	public function getTotalPromocodes() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "customer_to_promocode");

		return $query->row['total'];
	}



	public function getPromocodesByCountryId($country_id) {
		$promocode_data = $this->cache->get('promocode.' . (int)$country_id);

		if (!$promocode_data) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promocode WHERE country_id = '" . (int)$country_id . "' AND status = '1' ORDER BY name");

			$promocode_data = $query->rows;

			$this->cache->set('promocode.' . (int)$country_id, $promocode_data);
		}

		return $promocode_data;
	}

	

	public function getTotalPromocodesByCountryId($country_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promocode WHERE country_id = '" . (int)$country_id . "'");

		return $query->row['total'];
	}
}