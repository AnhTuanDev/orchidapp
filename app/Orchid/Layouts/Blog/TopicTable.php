<?php

namespace App\Orchid\Layouts\Blog;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use App\Models\Blog\Topic;
use Orchid\Screen\TD;

class TopicTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'topics';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [

            TD::make('name')->sort(),
            TD::make('Actions')
                ->alignRight()
                ->render(function (Topic $topic) {
                    return Button::make('Delete Task')
                        ->confirm('Thao tác này sẽ xóa chuyên mục và các bản ghi liên quan')
                        ->method('delete', ['topic' => $topic->id]);
                }),

        ];
    }

    protected function textNotFound(): string
    {
        return __('Không có danh mục nào được tìm thấy');
    }

    protected function subNotFound(): string
    {
        return '';
    }
}
