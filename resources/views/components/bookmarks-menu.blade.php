<div class="flex justify-end">
    @if ($menuitems)
        <x-filament::dropdown placement="bottom-end">
            <x-slot name="trigger" class="ml-4">
                <button  @class([
                'flex flex-shrink-0 w-10 h-10 rounded-full items-center justify-center hover:bg-gray-500/5',
                'dark:hover:bg-gray-300/5' => config('filament.dark_mode'),
            ]) aria-label="{{ __('filament::layout.buttons.user_menu.label') }}">
                    @svg(config('filament-bookmarks-menu.bookmark_icon'), config('filament-bookmarks-menu.bookmark_class'))
                </button>
            </x-slot>
            @if(!$menuitems->count())
                <p class="p-4">{{ __('filament-bookmarks-menu::filament-bookmarks-menu.notification.empty') }}</p>
            @endif
            <x-filament::dropdown.list>
                @if($menuitems->whereNotNull('menu_user_id')->count()>0)
                <div class="filament-dropdown-header w-full rounded-md border-1 divide-y divide-gray-100 dark:divide-gray-700 focus:outline-none">
                    <div class="px-4 py-3" role="none">
                        <p class="filament-dropdown-header flex justify-content items-center truncate text-md font-medium text-gray-900 dark:text-gray-200">@svg('heroicon-s-star', 'h-5 mr-2')Favorieten</p>
                    </div>
                    <div class="py-1">
                        @foreach($menuitems->whereNotNull('menu_user_id') as $menuitem)
                            <a href="{{ $menuitem['menu_url'] }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-700"> {{ $menuitem['menu_label'] }}</a>
                        @endforeach
                    </div>
{{--                    <div class="py-1" role="none">--}}
{{--                        <form method="POST" action="#" role="none">--}}
{{--                            <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
                @endif
            </x-filament::dropdown.list>
        </x-filament::dropdown>
    @endif
</div>
