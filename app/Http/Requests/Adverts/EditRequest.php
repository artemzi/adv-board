<?php

namespace Board\Http\Requests\Adverts;

use Board\Entity\Adverts\Category;
use Board\Entity\Region;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Category $category
 * @property Region $region
 */
class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|integer',
            'address' => 'required|string',
        ];
    }
}
