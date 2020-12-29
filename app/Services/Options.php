<?php


namespace App\Services;


use App\Models\Option;
use Illuminate\Support\Facades\Cache;

class Options
{
    private $options;
    public function __construct()
    {
        $this->options = Cache::rememberForever('options', function() {
            return Option::all();
        });
    }

    public function save(array $params)
    {
        return collect($params)->each(function($value, $key) {
            if( $key != 'submit' && $key != 'tab' && $key != 'id' && $key != '_token') {
                Option::where('label', $key)->update([
                    'field' => $key,
                    'value' => $value
                ]);
            }
            return true;
        });
    }

    public function get($key, $default_value = '')
    {
        $item = $this->options->first(function($item, $_k) use($key, $default_value) {
            return $item->field == $key;
        }, function() use($default_value) {
            return $default_value;
        });

        return (is_object($item)) ? $item->value : $item;
    }
}
