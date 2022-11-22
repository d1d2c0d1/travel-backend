<?php

namespace App\Models;

use App\Http\Helpers\MainHelper;
use App\Observers\SiteOptionObserver;
use datetime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Item
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $value
 * @property string $type
 * @property string $validate
 * @property int $user_created_at
 * @property int $user_updated_at
 * @property datetime $created_at
 * @property datetime $updated_at
 */
class SiteOption extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'site_options';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *
     * Date format im model
     *
     **/
    protected $dateFormat = "Y-m-d H:i:s";

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
     * The append attributes (custom attributes)
     *
     * @var array
     */
    protected $appends = [
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'value',
        'type',
        'validate',
        'user_created_at',
        'user_updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'value' => 'string',
        'type' => 'string',
        'validate' => 'string',
        'user_created_at' => 'integer',
        'user_updated_at' => 'integer',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Validator
     *
     * @return array
     */
    public function validate(): array
    {
        $errors = [];

        // CODE
        if (mb_strlen($this->code) <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field code is empty');
        }

        // NAME
        if (mb_strlen($this->name) <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field name is empty');
        }

        // VALUE
        if (mb_strlen($this->value) <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field value is empty');
        }

        // TYPE
        if (mb_strlen($this->type) <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field type is empty');
        }

        // user_created_at
        if ($this->user_created_at <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field user_created_at is empty');
        }

        // user_updated_at
        if ($this->user_updated_at <= 0) {
            $errors[] = MainHelper::getErrorItem(412, 'Field user_updated_at is empty');
        }

        // Without errors
        if (empty($errors)) {
            return ['status' => true];
        }

        // With errors
        return [
            'status' => false,
            'errors' => $errors
        ];
    }

    public static function boot(): void
    {
        parent::boot();
        self::observe(SiteOptionObserver::class);
    }

    public function CreatedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_created_at');
    }

    public function UpdatedUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_updated_at');
    }

    const CREATING_RULES = [
        'code' => 'required|string',
        'name' => 'required|string',
        'value' => 'required|string',
        'type' => 'required|string|max:64',
        'validate' => 'required|string|max:1024',
        'user_created_at' => 'required|exist:users,id',
        'user_updated_at' => 'required|exists:users,id',
    ];

    const UPDATING_RULES = [
        'code' => 'string',
        'name' => 'string',
        'value' => 'string',
        'type' => 'string|max:64',
        'validate' => 'string:max:1024',
        'user_updated_at' => 'exists:users,id'
    ];

    const TIME_CACHE = 86400 * 30;
}
