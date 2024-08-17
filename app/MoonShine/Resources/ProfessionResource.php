<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profession;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Slug;
use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Fields\Image;
use MoonShine\Fields\Field;
use MoonShine\Fields\Checkbox;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Profession>
 */
class ProfessionResource extends ModelResource
{
    protected string $model = Profession::class;

    protected string $title = 'Профессии';

    protected string $column = 'title';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->hideOnIndex(),
                Text::make('Название', 'title'),
                Slug::make('URL-имя', 'slug')->from('title'),
                CKEditor::make('Полное описание', 'description')->hideOnIndex(),
                CKEditor::make('Короткое описание', 'short_description')->hideOnIndex(),
                CKEditor::make('Пример', 'example')->hideOnIndex(),
                Image::make('Изображение', 'image_path')->dir('images/professions'),
                CKEditor::make('Виды деятельности', 'occupation')->hideOnIndex(),
                CKEditor::make('История профессии', 'history')->hideOnIndex(),
                CKEditor::make('Востребованные отрасли', 'demanded_industries')->hideOnIndex(),
                CKEditor::make('Карьерный рост', 'career')->hideOnIndex(),
                CKEditor::make('Описание динамики вакансий', 'description_count_vacancies')->hideOnIndex(),
                CKEditor::make('Описания динамики ЗП', 'description_salary')->hideOnIndex(),
                Checkbox::make('Наличие статистики', 'is_have_statistics')->hideOnIndex(),
            ]),
        ];
    }

    /**
     * @param Profession $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:10', 'max:10000'],
            'short_description' => ['required', 'string', 'min:10', 'max:1000'],
            'example' => ['required', 'string', 'min:10', 'max:3000'],
            'image_path' => ['image', 'mimes:jpeg,jpg,png,gif,svg', 'max:1000'],
            'occupation' => ['required', 'string', 'min:10', 'max:3000'],
            'history' => ['required', 'string', 'min:10', 'max:3000'],
            'demanded_industries' => ['required', 'string', 'min:10', 'max:3000'],
            'career' => ['required', 'string', 'min:10', 'max:3000'],
            'description_count_vacancies' => ['required', 'string', 'min:10', 'max:3000'],
            'description_salary' => ['required', 'string', 'min:10', 'max:3000'],
        ];
    }
}
