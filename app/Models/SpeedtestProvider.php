<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\SpeedtestProvider
 *
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedtestProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedtestProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedtestProvider query()
 */
class SpeedtestProvider extends Model
{
    use HasFactory;

    protected $table = 'speedtest_provider';

    protected $fillable = ['name'];

    public function history(): HasMany
    {
        return $this->hasMany(SpeedTestHistory::class);
    }
}
