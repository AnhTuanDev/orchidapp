<?php

namespace App\Orchid\Layouts\Blog;

use App\Models\Blog\Topic;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Rows;

class TopicEditModal extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [

            Select::make('topic.parent_id')
                ->tabindex(1)
                ->empty('Chọn một danh mục cha mẹ', 0)
                ->fromQuery(Topic::where('parent_id', null)->where('status', '=', 1), 'name')
                ->title('Thuộc về chuyên mục'),

            Input::make('topic.name')
                ->autofocus()
                ->tabindex(2)
                ->placeholder('Nhập tên chuyên mục')
                ->title('Tên'),

            Input::make('topic.slug')
                ->tabindex(4)
                ->placeholder('Nhập seo url')
                ->title('Seo url'),

            Switcher::make('category.status')
                ->sendTrueOrFalse()
                ->title('Hiển thị')
                ->placeholder('Hiển thị danh mục'),

        ];
    }
}
