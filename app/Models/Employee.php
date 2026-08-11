<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        "user_id",
        "employee_number",
        "first_name",
        "last_name",
        "gender",
        "birth_place",
        "birth_date",
        "phone",
        "personal_email",
        "address",

        "organization_id",
        "position_id",

        "join_date",
        "termination_date",
        "status",
        "is_active",

        "bank_name",
        "bank_account_number",
        "bank_account_name"
    ];

    protected $casts = [
        'birth_date' => 'date',
        'join_date' => 'date',
        'termination_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function manager()
    {
        return $this->hasMany(Organization::class, 'manager_id');
    }

    public function employmentContracts()
    {
        return $this->hasMany(EmploymentContract::class);
    }
}
