<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed group
 */
class LinkRequest extends FormRequest
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
            'link'        => 'required|url|max:191',
            'name'        => 'required|max:191',
            'description' => 'max:500',
            'access_id'   => 'required|numeric',
            //'group'       => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'link' => __('main.link'),
        ];
    }

    protected function getValidatorInstance()
    {
        $this->formatLink();
        return parent::getValidatorInstance();
    }

    protected function formatLink()
    {
        $link = $this->request->get('link');

        if (strpos($link, 'http') !== 0) {
            $this->merge([
                'link' => 'http://' . $link
            ]);
        }
    }

}
