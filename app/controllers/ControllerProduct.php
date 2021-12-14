<?php
require_once File::getApp(array("models", "ModelProduct.php"));

class ControllerProduct extends Controller {
  protected static $object = "product";

  public static function readAll() {
    $page_title = 'Boutique';
    $view = 'list';
    $tab_prod = ModelProduct::selectAll();
    require File::getApp(array("views", "view.php"));
  }

  public static function read() {
    if (isset($_GET['id'])) {
      $value = ModelProduct::select($_GET['id']);
      if ($value) {
        $page_title = 'Détail du produit';
        $view = 'detail';
        require(File::getApp(array("views", "view.php")));
      } else {
        $page_title = 'Détail du produit';
        $view = 'error';
        require(File::getApp(array("views", "view.php")));
      }
    } else {
      header('Location: ?a=home');
    }
  }

  public static function create() {
    if (Session::isAdmin()) {
      $page_title = 'Créer un produit';
      $view = 'create';
      require File::getApp(array("views", "view.php"));
    } else {
      header('Location: ?a=home');
    }
  }

  public static function created() {
    if (Session::isAdmin()) {
      if (isset($_POST['tag'], $_POST['discount'], $_POST['name'], $_POST['description'], $_POST['price'])) {
        $value = array("tag_id" => $_POST['tag'], "discount_id" => $_POST['discount'], "name" => $_POST['name'], "description" => $_POST['description'], "price" => $_POST['price']);
        ModelProduct::create($value);
      }
      header('Location: ?a=readAll&c=product');
    } else {
      header('Location: ?a=home');
    }
  }

  public static function delete() {
    if (Session::isAdmin()) {
      if (isset($_GET['id'])) {
        ModelProduct::delete($_GET['id']);
      }
      ControllerProduct::readAll();
    } else {
      header('Location ?a=home');
    }
  }

  public static function update() {
    if (Session::isAdmin()) {
      if (isset($_GET['id'])) {
        $value = ModelProduct::select($_GET['id']);
        $page_title = 'Modifier un produit';
        $view = 'update';
        require File::getApp(array("views", "view.php"));
      } else {
        header('Location: ?a=home');
      }
    } else {
      header('Location: ?a=home');
    }
  }

  public static function updated() {
    if (Session::isAdmin()) {
      if (isset($_POST['tag'], $_POST['discount'], $_POST['name'], $_POST['description'], $_POST['price'])) {
        //$valueimg = array("img_name" => $_POST['name'], "img_blob" => file_get_contents($_FILES['picture']["tmp_name"]));
        //$image = ControllerImages::addImg($valueimg);
        $value = array("tag_id" => $_POST['tag'], "discount_id" => $_POST['discount'], "name" => $_POST['name'], "description" => $_POST['description'], "price" => $_POST['price']/*, "product_picture_id" => $image->get('img_id')*/);
        $id = $_POST['id'];
        ModelProduct::update($value, $id);
        header('Location: ?a=readAll&c=product');
      } else {
        header('Location: ?a=update&c=product&id=' . urlencode($_POST['id']));
      }
    } else {
      header('Location: ?a=home');
    }
  }
}
