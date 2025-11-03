<?php // PHPファイルであることを示す（必須）

namespace App\Http\Requests; // 名前空間の指定（App\Http\Requests配下に存在することを示す）

use App\Models\User; // Userモデルをインポート（バリデーションで使用する）
use Illuminate\Foundation\Http\FormRequest; // FormRequestを継承してリクエストバリデーションを作成
use Illuminate\Validation\Rule; // バリデーションルールをカスタマイズするために使用

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'], // nameは必須、文字列で最大255文字
            'email' => [
                'required', // emailは必須
                'string', // 文字列であること
                'lowercase', // 小文字であること（Laravel 10以降のルール）
                'email', // 有効なメール形式であること
                'max:255', // 最大255文字
                Rule::unique(User::class)->ignore($this->user()->id), // Userテーブルで重複不可、ただし現在のユーザーは無視
            ],
        ];
    }
}
