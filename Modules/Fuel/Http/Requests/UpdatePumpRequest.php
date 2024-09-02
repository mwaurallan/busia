<?php

namespace Modules\Fuel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Fuel\Entities\Pump;

class UpdatePumpRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Pump::$rules;
        
        return $rules;
    }
}
