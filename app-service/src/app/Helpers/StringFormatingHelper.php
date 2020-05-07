<?php

namespace App\Helpers;

class StringFormatingHelper
{

  /**
   * @todo
   */
  public static function formatDuration(int $min)
  {
    $h = intval($min/60);
    $m = ($min/60 - $h) * 60;
    $m = $m === 0 ? '' : $m;

    if ($h >= 1)
      return $h . 'h' . $m;

    return $m . ' min';
  }

  /**
   * @todo
   */
  public static function formatBool(bool $bool)
  {
    return $bool ? "Yes" : "No";
  }

}
