<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\SelectOption;
use Illuminate\Support\Facades\Log;

class Sos implements Rule
{
    protected $options=[];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($key)
    {
        $so = SelectOption::where('key', $key)->get();
        $this->options = $so->map(function($val) { return $val->option;});

        Log::debug($this->options);

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->options->contains($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute 数据不正确';
    }
}
