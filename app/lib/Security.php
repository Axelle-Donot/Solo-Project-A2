<?php

class Security {
  public static function hacher($str): string {
    return hash('sha256', $str);
  }
}