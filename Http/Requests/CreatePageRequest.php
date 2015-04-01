<?php namespace Modules\Page\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePageRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'page::pages.validation.attributes';

    public function rules()
    {
        return [
            'template' => 'required',
            'is_home' => 'unique:page__pages',
        ];
    }

    public function translationRules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
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
