<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AngsuranRequest extends FormRequest
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
            'tanggal_seharusnya' => 'required',
            'tanggal_pembayaran' => 'required',
            'pokok_dibayar' => 'required',
            'pokok_tunggakan' => 'required',
            'jasa_dibayar' => 'required',
            'jasa_tunggakan' => 'required',
         ];
    }
}
