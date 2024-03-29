<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Campaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'target_amount',
        'duration',
        'description',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'duration' => 'date',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($campaign) {
            $campaign->slug = Str::slug($campaign->title) . '-' .  time();
        });
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)
            ->withCount(['donations' => function (Builder $query) {
                $query->where('status', 'success');
            }])
            ->withDonationsAmount()
            ->firstOrFail();
    }

    public function getDurationInDaysAttribute()
    {
        if ($this->duration->lte(now())) {
            return '-';
        }

        return $this->duration->diffInDays();
    }

    /**
     * Scope a query to count donations_amount.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeWithDonationsAmount(Builder $query)
    {
        $query->withSum(['donations' => function (Builder $query) {
            $query->where('status', 'success');
        }], 'amount');
    }

    /**
     * Scope a query to get status open.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeOpen(Builder $query)
    {
        return $query->where('status', 'open');
    }

    /**
     * Scope a query to get status close.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeClose(Builder $query)
    {
        return $query->where('status', 'close');
    }

    /**
     * Scope a query to get search by title
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeSearch(Builder $query, $search)
    {
        return $query->where('title', 'like', '%' . $search . '%');
    }

    public function getFormattedTargetAmountAttribute()
    {
        return 'Rp ' . number_format($this->target_amount ?? 0, 0, '.', '.');
    }

    public function getDonationsAmountAttribute()
    {
        return 'Rp ' . number_format($this->donations_sum_amount ?? 0, 0, '.', '.');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
