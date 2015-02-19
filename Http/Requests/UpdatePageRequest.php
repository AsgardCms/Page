<?php namespace Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    public function rules()
    {
        $page = $this->route()->getParameter('pages');

        return [
            'template' => 'required',
            'is_home' => "unique:page__pages,is_home,{$page->id}",
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'template.required' => trans('page::messages.template is required'),
            'is_home.unique' => trans('page::messages.only one homepage allowed'),
        ];
    }
}
