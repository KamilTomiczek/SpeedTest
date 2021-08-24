<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\SpeedTestHistory
 *
 * @property int $id
 * @property string $ping
 * @property string $download_speed
 * @property string $upload_speed
 * @property string $domain
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereDownloadSpeed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory wherePing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpeedTestHistory whereUploadSpeed($value)
 * @mixin \Eloquent
 */
class SpeedTestHistory extends Model
{
    protected $table = "speedtest_history";
    protected $fillable = [
        'ping',
        'download_speed',
        'upload_speed',
        'provider_id'
    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(SpeedtestProvider::class);
    }
}
