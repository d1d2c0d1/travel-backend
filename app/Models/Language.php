<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Languages
 *
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Country[] $countries
 * @property-read int|null $countries_count
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @mixin \Eloquent
 */
class Language extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'code',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',

    ];

    /**
     * Rules for validation row in time of create row
     */
    const RuleList = [

        'name' => ['string', 'min:3'],
        'code' => ['required', 'size:2'],

    ];

    /**
     * Relationship to Country model
     *
     * @return HasMany
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'language_id', 'id');
    }

}
