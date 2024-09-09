<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\Date;
use MoonShine\Components\MoonShineComponent;
use MoonShine\ActionButtons\ActionButton;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи';

    protected string $column = 'email';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable()->hideOnIndex(),
                Text::make('Имя', 'name'),
                Email::make('Почта', 'email'),
                Date::make('Дата регистрации', 'created_at')->hideOnIndex()->hideOnForm(),
                Date::make('Дата последних изменений', 'updated_at')->hideOnIndex()->hideOnForm(),
                Text::make('Пароль', 'password')->hideOnIndex()->hideOnUpdate()->hideOnDetail(),
            ]),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:25'],
        ];
    }
}
