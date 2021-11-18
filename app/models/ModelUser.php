<?php

require_once File::getApp(array("models","Model.php"));


class ModelUser {

	private $user_id;
	private $username;
	private $password;
	private $last_name;
	private $first_name;
	private $mail;
	private $phone;

	public function getUserId() {
		return $this->user_id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getLastName() {
		return $this->last_name;
	}

	public function getFirstName() {
		return $this->first_name;
	}

	public function getMail() {
		return $this->mail;
	}
	public function getPhone() {
		return $this->phone;
	}

	public function setUserId($id) {
		$this->user_id = $id;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setLastName($lastname) {
		$this->last_name = $lastname;
	}

	public function setFirstName($firstname) {
		$this->first_name = $firstname;
	}

	public function setMail($mail) {
		$this->mail = $mail;
	}

	public function setPhone($phone) {
		$this->phone = $phone;
	}


	public function __construct($id, $username, $password, $lastname, $firstname, $mail, $phone) {
		$this->user_id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->last_name = $lastname;
		$this->first_name = $firstname;
		$this->mail = $mail;
		$this->phone = $phone;
	}
}
?>