<?php

class File {

  const DS = DIRECTORY_SEPARATOR;
  const APP_FOLDER = __DIR__ . self::DS . '..' . self::DS;
  const ROOT_FOLDER = self::APP_FOLDER . '..' . self::DS;

  public static function getApp(array $path_array) {
    return self::APP_FOLDER . join(self::DS, $path_array);
  }

  public static function getRoot(array $path_array) {
    return self::ROOT_FOLDER . join(self::DS, $path_array);
  }

  public static function getPublic(array $path_array) {
    return self::ROOT_FOLDER . self::DS . 'public' . self::DS . join(self::DS, $path_array);
  }

}
