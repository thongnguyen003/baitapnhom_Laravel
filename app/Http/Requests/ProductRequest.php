<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'information' => 'required|string',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'old_price' => 'required|numeric|min:0',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,webp'
        ];
    }
    public function messages()
    {
        return [
            'category.required' => 'Danh mục sản phẩm là bắt buộc.',
            'information.required' => 'Thông tin sản phẩm là bắt buộc.',
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là số.',
            'price.min' => 'Giá sản phẩm không được nhỏ hơn 0.',
            'image.required' => 'Ảnh sản phẩm là bắt buộc.',
            'image.file' => 'Tệp tải lên phải là một tệp hợp lệ.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg, gif hoặc webp.',
            'image.max' => 'Ảnh không được lớn hơn 5MB.'
        ];
    }
}
