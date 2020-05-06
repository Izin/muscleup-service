<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsSession extends Model
{
  protected $fillable = [
    'date_session',
    'pull_ups',
    'push_ups',
    'is_running',
    'duration_minutes',
    'comment'
  ];
}
