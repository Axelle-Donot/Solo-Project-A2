<?php

class Security {
  private static $seed = 'eZt9rO5IV1kwJfVjE3ke';

  public static function hacher($str): string {
    return hash('sha256', ($str . self::$seed));
  }

  public static function generateRandomHex(): string {
    // Generate a 32 digits hexadecimal number
    $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
    $bytes = openssl_random_pseudo_bytes($numbytes);
    $hex   = bin2hex($bytes);
    return $hex;
  }
}