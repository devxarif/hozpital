<?php

namespace App\Models;

use App\Models\ContactInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public const ROLE_EMPLOYEE = 'employee';

    public const ROLE_OWNER = 'owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $appends = ['avatar_url'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->contactInfo()->create([
                'address' => null,
                'phone' => null,
            ]);
        });
    }

    /**
     * Interact with the user's username.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function setNameAttribute(string $value): void
    {
        $username = Str::slug($value);
        $is_exists = User::whereUsername($username)->exists();
        $is_exists ? $username = $username.'-'.time() : $username;

        User::whereUsername($username)->exists();
        $this->attributes['name'] = $value;
        $this->attributes['username'] = $username;
    }

    public function getAvatarAttribute($avatar)
    {
        if (! $avatar) {
            return asset('assets/img/default-user.png');
        }

        return asset($avatar);
    }

    public function getAvatarUrlAttribute()
    {
        if (! $this->avatar) {
            return asset('assets/img/default-user.png');
        }

        return asset($this->avatar);
    }

    public static function getPermissionGroup()
    {
        $permission_group = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();

        return $permission_group;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();

        return $permissions;
    }

    public static function roleHasPermission($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (! $role->hasPermissionTo($permission->name)) {
                $hasPermission = false;

                return $hasPermission;
            }
        }

        return $hasPermission;
    }

    public function scopeRoleAdmin()
    {
        return $this->where('role', 'admin');
    }

    public function scopeRoleOwner()
    {
        return $this->where('role', 'owner');
    }

    public function scopeRoleEmployee()
    {
        return $this->where('role', 'employee');
    }

    public function scopeStaffs()
    {
        return $this->where('role', '!=', 'patient');
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class, 'user_id');
    }

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function nurse(): HasOne
    {
        return $this->hasOne(Nurse::class);
    }

    public function receptionist(): HasOne
    {
        return $this->hasOne(Receptionist::class);
    }

    public function laboratorist(): HasOne
    {
        return $this->hasOne(Laboratorist::class);
    }

    public function accountant(): HasOne
    {
        return $this->hasOne(Accountant::class);
    }

    public function pharmacist(): HasOne
    {
        return $this->hasOne(Pharmacist::class);
    }

    public function holidays()
    {
        return $this->hasManyThrough(Holiday::class, Organization::class);
    }

    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class);
    }
}
