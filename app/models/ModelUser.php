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
	private $profile_photo_id;

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

	public function getProfilePhotoId() {
		return $this->profile_photo_id;
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

	public function setProfilePhotoId($photo) {
		$this->profile_photo_id = $photo;
	}

	public function __construct($id = NULL, $username = NULL, $password = NULL, $lastname = NULL, $firstname = NULL, $mail = NULL, $phone = NULL, $photo = NULL){

		if (!is_null($id) && !is_null($username) && !is_null($password) && !is_null($lastname) && !is_null($firstname) && !is_null($mail) && !is_null($phone) && !is_null($photo)) { 

			$this->user_id = $id;
			$this->username = $username;
			$this->password = $password;
			$this->last_name = $lastname;
			$this->first_name = $firstname;
			$this->mail = $mail;
			$this->phone = $phone;
			$this->profile_photo_id = $photo;
		}	
	}

	public static function getAllUsers() {
        try {
            $rep = Model::getPDO()->query('SELECT * FROM proj__user');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUser');
        } catch (PDOException $e) {
            if (Conf::getDebug())
                echo $e->getMessage(); // affiche un message d'erreur
            else
                echo 'Une erreur est survenue';
            die();
        }
        return $rep->fetchAll();
    }
}
?>