<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Image;
use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Skill>
 */
class SkillResource extends ModelResource
{
    protected string $model = Skill::class;

    protected string $title = 'Навыки';

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
                Slug::make('URL-имя', 'slug'),
                CKEditor::make('Полное описание', 'description')->hideOnIndex(),
                CKEditor::make('Короткое описание', 'short_description')->hideOnIndex(),
                Image::make('Изображение', 'image_path')->hideOnIndex()->dir('images/skills'),
            ]),
        ];
    }

    /**
     * @param Skill $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
