<?php

namespace Gmlo\CMS\Requests;

use App\Http\Requests\Request;

class CreateArticle extends Request
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
            'title'     => 'required',
            'slug_url'  => 'required',
            'sumary'    => 'required',
            'title_seo' => 'required',
            'category_id' => 'required',
        ];
    }
}
