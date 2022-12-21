<div class="flex justify-end">
    @if ($menuitems)
        <x-filament::dropdown placement="bottom-end">
            <x-slot name="trigger" class="ml-4">
                <button  @class([
                'flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center',
                'dark:bg-gray-900' => config('filament.dark_mode'),
            ]) aria-label="{{ __('filament::layout.buttons.user_menu.label') }}">
                    @svg(config('filament-bookmarks-menu.bookmark_icon'), config('filament-bookmarks-menu.bookmark_class'))
                </button>
            </x-slot>
            @if(!$menuitems->count())
                <p class="p-4">{{ __('filament-bookmarks-menu::filament-bookmarks-menu.notification.empty') }}</p>
            @endif
            <x-filament::dropdown.list>
                @if($menuitems->whereNotNull('menu_user_id')->count()>0)
                    <div class="filament-dropdown-header flex w-full p-2 text-md font-semibold">
                        <span class="filament-dropdown-header-label">
                            Favorieten
                        </span>
                    </div>
                    <hr/>

                    @foreach($menuitems->whereNotNull('menu_user_id') as $menuitem)
                        <x-filament::dropdown.item
                            class="mt-1 mb-1"
                            :color="'secondary'"
                            icon=""
                            :href="$menuitem['menu_url']"
                            :target="$menuitem['menu_target']"
                            action="Create"
                            :tag="$menuitem['menu_url'] ? 'a' : 'button'"
                        >
                          {{ $menuitem['menu_label'] }}
                        </x-filament::dropdown.item>
                        <hr class="p-0.5 border-amber-200"/>
                    @endforeach
                @endif
            </x-filament::dropdown.list>
        </x-filament::dropdown>
    @endif
</div>
