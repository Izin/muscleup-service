<?php

namespace App\Helpers;

class StringFormatingHelper
{

  /**
   * Format minutes into a duration pattern
   * Examples:
   *  - 30 min
   *  - 2h15
   *
   * @param  int    $minutes
   * @return string Formatted duration
   */
  public static function formatDuration(int $minutes)
  {
    $h = intval($minutes/60);
    $m = ($minutes/60 - $h) * 60;
    $m = $m === 0 ? '' : $m;

    if ($h >= 1)
      return $h . 'h' . $m;

    return $m . ' min';
  }

  /**
   * Return Yes or No @TOREMOVE

   * @param  bool    $bool
   * @return string  Yes|No
   */
  /**
   * @todo
   */
  public static function formatBool(bool $bool)
  {
    return $bool ? "Yes" : "No";
  }

}
