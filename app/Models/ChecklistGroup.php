<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChecklistGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get all of the comments for the ChecklistGroup
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checklists(): HasMany
    {
        return $this->hasMany(Checklist::class);
    }
}
