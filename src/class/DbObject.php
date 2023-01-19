<?php

class DbObject {
    public $created_at;

    public function getCreatedAt() {
		$this->created_at = date('Y-m-d H:i:s');
        $date = new DateTime($this->created_at);
        return $date->format('d/m/Y H:i:s');
    }
}