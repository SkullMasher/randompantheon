<?php
class Band extends \Illuminate\Database\Eloquent\Model
{
  // Eloquent Model class finds the database by himself (plural of User)
  // protected $table = 'users';

  // Writable column list
  // protected $fillable = ['name', 'mail', 'password'];

  public $timestamps = false;
}
