<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

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
            ->withCount('donations')
            ->withDonationsAmount()
            ->firstOrFail();
    }

    /**
     * Get the campaign's duration.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function duration(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (new Carbon($value))->diffInDays(),
        );
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
     * Scope a query to get status completed.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeCompleted(Builder $query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to get status completed.
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
