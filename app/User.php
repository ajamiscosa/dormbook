<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The primary key of the table
     * @var string
     */
    protected $primaryKey = "ID";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID',
        'Username',
        'Password',
        'EmailAddress',
        'LastName',
        'FirstName',
        'AccessLevel',
        'Status'
    ];

    public function isAdministrator() {
        return $this->AccessLevel == 1;
    }

    public function getFullName() {
        return sprintf("%s %s", $this->FirstName, $this->LastName);
    }
}