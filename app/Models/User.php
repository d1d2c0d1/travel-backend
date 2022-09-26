<?php

namespace App\Models;

use App\Casts\User\AdditionalProperties;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class Users
 *
 * @package App\Models
 * @property integer $id
 * @property integer $role_id
 * @property string $name
 * @property integer $sex
 * @property string $email
 * @property integer $phone
 * @property string $password
 * @property string $remember_token
 * @property string $token
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $area_id
 * @property integer $language_id
 * @property integer $company_id
 * @property string $photo
 * @property integer $type_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $additional_properties
 * @property-read \App\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The table date format
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

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
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'role_id',
        'name',
        'sex',
        'email',
        'phone',
        'password',
        'remember_token',
        'country_id',
        'region_id',
        'city_id',
        'area_id',
        'language_id',
        'company_id',
        'photo',
        'additional_properties',
        'token',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'id' => 'integer',
        'role_id' => 'integer',
        'type_id' => 'integer',
        'name' => 'string',
        'sex' => 'integer',
        'email' => 'string',
        'phone' => 'integer',
        'password' => 'string',
        'remember_token' => 'string',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'area_id' => 'integer',
        'language_id' => 'integer',
        'company_id' => 'integer',
        'photo' => 'string',
        'token' => 'string',
        'additional_properties' => AdditionalProperties::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',

    ];

    /**
     * Relationship for getting role
     *
     * @return HasOne
     **/
    public function role(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * Relationship for getting user type
     *
     * @return HasOne
     **/
    public function type(): HasOne
    {
        return $this->hasOne(UserType::class, 'id', 'type_id');
    }

    /**
     * Relationship for getting user company
     *
     * @return HasOne
     **/
    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    /**
     * Generate Array from object
     *
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();
        $data['additional_properties'] = json_encode($data['additional_properties']);
        return $data;
    }

    /**
     * Generate tokens for users
     *
     * @return string
     */
    public function generateToken(): string
    {
        $data = $this->toArray();
        $data[] = rand(1000, 100000);
        $data[] = date('M-Yd-HuimSs-Ihy-SA-S');
        $data[] = rand(1000, 100000);
        return Hash::make(implode(':', $data));
    }

    /**
     * Replacing user photo if empty
     *
     * @param string|null $value
     * @return string|null
     */
    public function getPhotoAttribute(string | null $value): string | null
    {
        if( empty($value) || !mb_stristr($value, 'attachments') ) {
            switch ($this->sex) {
                case 0:
                    return '/attachments/2022/09/16/fc1de181bfe47ec70488c57f769b36ef-Net-foto-5.png';
                case 1:
                    return '/attachments/2022/09/16/3fa84698c81082d5ccf7c468c9c978f7-male-placeholder-400px.jpg';
                case 2:
                    return '/attachments/2022/09/16/2cfed755b5d44278b93d379cc94ddb64-nor__team_color_02__min-2.jpg';
            }
        }

        return $value;
    }
}
