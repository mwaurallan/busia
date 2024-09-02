<?php

namespace Modules\Fuel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Fuel\Entities\Pump;

class CreatePumpRequest extends FormRequest
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
        return Pump::$rules;
    }
}
