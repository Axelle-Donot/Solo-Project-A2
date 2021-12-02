<?php

class Security {
  private static $seed = 'eZt9rO5IV1kwJfVjE3ke';

  public static function hacher($str): string {
    return hash('sha256', ($str . self::$seed));
  }
}