<?php



namespace App\EloquentFilters;
use Illuminate\Database\Eloquent\Builder;

class KeywordFilter
{
     /**
     * Apply the filter after validation passes & sanitize
     * @param string $value
     * @param  Builder  $builder
     */
    public function handle(string $value, Builder $builder): void
    {
        $builder->where('label', $value);
        
    }

  
   

    /**
     * @param mixed $value
     * @return bool|string|array
     */
    public function validate($value)
    {
        return is_string($value);
    }
}
