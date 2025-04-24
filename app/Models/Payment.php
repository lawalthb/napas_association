<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_name',
        'amount',
        'start_date',
        'end_date',
        'status',
        'description'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'amount' => 'decimal:2'
    ];

    /**
     * Get the levels that are applicable for this payment.
     */
    public function levels()
    {
        return $this->belongsToMany(Levels::class, 'payment_levels', 'payment_id', 'level_id');
    }

    /**
     * Set search query for the model
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $text
     */
    public static function search($query, $text)
    {
        $search_condition = '(
            payment_name LIKE ? OR
            description LIKE ?
        )';

        $search_params = [
            "%$text%", "%$text%"
        ];

        $query->whereRaw($search_condition, $search_params);
    }

    /**
     * Return list page fields of the model.
     *
     * @return array
     */
    public static function listFields()
    {
        return [
            "id",
            "payment_name",
            "amount",
            "start_date",
            "end_date",
            "status",
            "description",
            "created_at",
            "updated_at"
        ];
    }

    /**
     * Return view page fields of the model.
     *
     * @return array
     */
    public static function viewFields()
    {
        return [
            "id",
            "payment_name",
            "amount",
            "start_date",
            "end_date",
            "status",
            "description",
            "created_at",
            "updated_at"
        ];
    }

    /**
     * Return edit page fields of the model.
     *
     * @return array
     */
    public static function editFields()
    {
        return [
            "id",
            "payment_name",
            "amount",
            "start_date",
            "end_date",
            "status",
            "description"
        ];
    }



}
