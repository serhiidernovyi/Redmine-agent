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
            'priority_id'=> 'required|int',
            'tracker_id'=> 'int',
            'status_id' => 'int',
            'subject'=> 'required|string|max:255|min:2',
            'description'=> 'string|max:1000|min:2'
        ];
    }

    public function getProjectId(): int
    {
        return $this->input('project_id');
    }

    public function getTrackerId(): int|null
    {
        return $this->input('tracker_id');
    }

    public function getStatusId(): int|null
    {
        return $this->input('status_id');
    }

    public function getPriorityId(): int
    {
        return $this->input('priority_id');
    }

    public function getSubject(): string
    {
        return $this->input('subject');
    }

    public function getDescription(): string
    {
        return $this->input('description', '');
    }
}
