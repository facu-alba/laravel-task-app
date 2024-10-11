<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    const NAME = 'name';
    const TASK_LIST_ID = 'task_list_id';
    const DESCRIPTION = 'description';

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
        return [
            self::NAME => 'required',
            self::TASK_LIST_ID => 'required',
            self::DESCRIPTION => 'nullable',         
        ];
    }
}
