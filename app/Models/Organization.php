<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Organization extends Model
{
    use HasFactory;

    protected $appends = ['organization_logo_url'];

    protected static function booted()
    {
        static::created(function ($organization) {
            // Attach subscription to organization
            $organization->subscription()->create([
                'plan_id' => 1,
                'expired_date' => now()->addMonth(),
                'subscription_type' => 'monthly',
            ]);

            // Attach working days to organization
            $organization->workingDays()->create([
                'monday' => true,
                'tuesday' => true,
                'wednesday' => true,
                'thursday' => true,
                'friday' => true,
                'saturday' => true,
                'sunday' => false,
            ]);

            // Attach leave types to organization
            $organization->leaveTypes()->create([
                'name' => 'Casual Leave',
                'color' => '#00D084',
                'balance' => 14,
                'description' => 'Casual leave means leave to cover casual absence of the sales promotion employee from duty for personal reasons',
            ]);
            $organization->leaveTypes()->create([
                'name' => 'Paid Leave',
                'color' => '#EB144C',
                'balance' => 14,
                'description' => 'Paid Leave is time allowed away from work for holiday, illness, etc. during which you receive your normal pay',
            ]);
            $organization->leaveTypes()->create([
                'name' => 'Sick Leave',
                'color' => '#FF9F43',
                'balance' => 7,
                'description' => 'Sick Leave is time away from work because of illness',
            ]);
        });
    }

    /**
     * The attributes that should be return full organization logo url
     *
     * @param  string  $logo
     * @return string
     */
    public function getOrganizationLogoUrlAttribute()
    {
        if (! $this->organization_logo) {
            return asset('assets/img/default-user.png');
        }

        return asset($this->organization_logo);
    }

    /**
     * The attributes that should be return teams model data
     *
     * @return array
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return void
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return void
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return array
     */
    public function leaveTypes(): HasMany
    {
        return $this->hasMany(LeaveType::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return array
     */
    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return array
     */
    public function holidays(): HasMany
    {
        return $this->hasMany(Holiday::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return array
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return object
     */
    public function theme(): HasOne
    {
        return $this->hasOne(OrganizationTheme::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return object
     */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class, 'organization_id');
    }

    /**
     * The attributes that should be return orders model data
     *
     * @return array
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'organization_id');
    }

    /**
     * The attributes that should be return workingDays model data
     *
     * @return object
     */
    public function workingDays(): HasOne
    {
        return $this->hasOne(WorkingDay::class, 'organization_id');
    }

    /**
     * The attributes that should be return departments model data
     *
     * @return array
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'organization_id');
    }

    /**
     * The attributes that should be return designations model data
     *
     * @return array
     */
    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class, 'organization_id');
    }
}
