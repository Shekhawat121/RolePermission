<?php

namespace Modules\EmployeeManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\EmployeeManager\Database\Factories\EmployeeFactory;
use Kyslik\ColumnSortable\Sortable;


class Employee extends Model
{
    use HasFactory, Sortable;
    public $sortable = ['employee_id', 'email', 'name', 'created_at'];

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name' , 'email' , 'dob', 'doj', 'employee_id'];

    // protected static function newFactory(): EmployeeFactory
    // {
    //     // return EmployeeFactory::new();
    // }
}
