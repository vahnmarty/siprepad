<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religious extends Model
{
    use HasFactory;
    use HasFactory;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'family_spirituality' => 'array'
    ];

    protected $fillable = [
        'user_id', 'application_id', 'religion_id', 'other_religion', 'church_faith_community', 'church_faith_location',
        'family_spirituality_statement', 'family_spirituality', 'describe_family_spirituality',
        'religious_studies_classes', 'religious_studies_explain',
        'school_liturgies', 'school_liturgies_explain',
        'retreats', 'retreats_explain',
        'community_service', 'community_service_explain',
        'religious_form_submitted_by', 'relationship_id'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function relationship()
    {
        return $this->belongsTo(Relationship::class, 'relationship_id', 'id');
    }
}
