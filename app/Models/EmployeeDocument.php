<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    const UPDATED_AT = null;

    public function getFileUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // If it's already a full non-azure URL, return it
        if (filter_var($value, FILTER_VALIDATE_URL) && !str_contains($value, 'blob.core.windows.net')) {
            return $value;
        }

        // Extract path if it's a full Azure URL stored previously
        $path = $value;
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $parsedUrl = parse_url($value);
            $path = ltrim($parsedUrl['path'] ?? '', '/');
            // Remove container name if present in path (Azure urls look like /container/filename)
            $container = env('AZURE_STORAGE_CONTAINER', 'employees');
            if (str_starts_with($path, $container . '/')) {
                $path = substr($path, strlen($container) + 1);
            }
        }

        try {
            return \Illuminate\Support\Facades\Storage::disk('azure')->temporaryUrl($path, now()->addMinutes(60));
        } catch (\Exception $e) {
            return \Illuminate\Support\Facades\Storage::disk('azure')->url($path);
        }
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
