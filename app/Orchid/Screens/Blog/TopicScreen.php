<?php

namespace App\Orchid\Screens\Blog;

use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Layout;
// use Orchid\Screen\Actions\Button;
use App\Models\Blog\Topic;
use App\Orchid\Layouts\Blog\TopicEditModal;
use App\Orchid\Layouts\Blog\TopicTable;
use Orchid\Screen\Screen;
// use Orchid\Screen\TD;

class TopicScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Topic $topic): iterable
    {
        return [
            'topics' => Topic::latest()->get(),
            'topic'  => $topic,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sach chuyên mục';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Thêm')
                ->icon('pencil')
                ->class('btn btn-primary rounded')
                ->modal('modalTopicEdit')
                ->method('topicCreateOrUpdate')
                ->modalTitle('Thêm chuyên muc'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            TopicTable::class,

            Layout::modal(
                'modalTopicEdit',
                TopicEditModal::class,
            )
                // ->closeButton('Thôi')
                ->withoutCloseButton()
                ->applyButton('Thêm')
                ->title('Thêm chuyên mục'),

        ];
    }
}
