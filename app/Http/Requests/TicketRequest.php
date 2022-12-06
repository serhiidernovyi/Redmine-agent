<?php

namespace App\Http\Requests;

use App\Http\Contracts\ITicketRequest;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest implements ITicketRequest
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
        return [
            'project_id'=> 'required|int',
            'tracker_id'=> 'required|int',
            'status_id' => 'required|int',
            'priority_id'=> 'required|int',
            'subject'=> 'required|string|max:255|min:2',
            'description'=> 'required|string|max:1000|min:2'
        ];
    }
}
