<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
//        dd($this->category);
        return [
            'name' => [
                'bail',
                'required',
                'string',
                //Kiểm tra xem id đã tồn tại chưa, nếu c thì ko update tên
                Rule::unique(Category::class)->ignore($this->category),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Tên phải là 1 kí tự',
            'name.unique' => 'Tên đã được sử dụng',
        ];
    }
}
