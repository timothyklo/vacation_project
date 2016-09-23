<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Model {
  public function author($post) {
    $query="INSERT INTO authors (name, created_at, updated_at) VALUES (?, ?, ?)";
    $values = array($post['author'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    return $this->db->query($query, $values)->row_array();
  }
  public function book($post) {
    $query="INSERT INTO books (title, created_at, updated_at, authors_id) VALUES (?, ?, ?, ?)";
    $values = array($post['title'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"), $auth['id']);
    return $this->db->query($query, $values)->row_array();
  }
  public function review($post) {
    $query="INSERT INTO reviews (review, rating, created_at, updated_at, ) VALUES (?, ?, ?, ?, 1, 1)";
    $values = array($post['review'],$post['stars'], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
    return $this->db->query($query, $values)->row_array();
  }
}