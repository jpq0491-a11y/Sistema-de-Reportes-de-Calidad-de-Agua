<?php

namespace App\Models;

use Database\Factories\ReporteFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $ubicacion
 * @property string|null $descripcion
 * @property Carbon $fecha_inicio
 * @property string $folio
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['user_id', 'ubicacion', 'descripcion', 'fecha_inicio', 'folio'])]
class Reporte extends Model
{
    /** @use HasFactory<ReporteFactory> */
    use HasFactory;

    /**
     * Get the user that created the reporte.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
        ];
    }
}
