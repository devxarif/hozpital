<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['organization_id','name','employee_id'];

    /**
    * The scope that should be return only current organization wise departments
    *
    * @param integer $organization_id
    *
    * @return array
    */
    public function scopeOrganizationDepartments($query, $organization_id = null)
    {
        if (!$organization_id) {
            return $query->where('organization_id',auth()->user()->current_organization_id);
        }

        return $query->where('organization_id',$organization_id);
    }

    /**
     * The attributes that should be return department head employee data
     *
     * @return void
     */
    public function employee() :BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * The attributes that should be return department employees data
     *
     * @return void
     */
    public function employees() :HasMany
    {
        return $this->hasMany(Employee::class, 'employee_id');
    }
}
