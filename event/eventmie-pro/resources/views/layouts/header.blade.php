
<div id="navbar_vue"
    class="nav-header nav-header-classic {{ \Str::contains(url()->current(), 'dashboard') ? 'shadow menu-fixed nav-dashboard' : 'menu-space header-position header-white' }}">
    <div class="{{ \Str::contains(url()->current(), 'dashboard') ? 'dashboard-container' : 'container' }}">
        <div class="row">
            <div class="col-md-12">
                <!-- GDPR -->
                <cookie-law theme="gdpr" button-text="@lang('eventmie-pro::em.accept')">
                    <div slot="message">
                        <gdpr-message></gdpr-message>
                    </div>
                </cookie-law>
                <!-- GDPR -->

                <!-- Vue Alert message -->
                @if ($errors->any())
                    <alert-message :errors="{{ json_encode($errors->all(), JSON_HEX_APOS) }}"></alert-message>
                @endif

                @if (session('status'))
                    <alert-message :message="'{{ session('status') }}'"></alert-message>
                @endif
                <!-- Vue Alert message -->

                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand pr-5" href="{{ url('') }}">

                        <img src="/storage/{{ setting('site.logo') }}"
                            class="mx-auto d-blocks {{ App::isLocale('ar') ? 'float-end' : 'float-start' }}"
                            alt="{{ setting('site.site_name') }}" style="height:50px;" />
                        <div class="my-2">
                            <p class="py-0 my-0 l-height site-name">
                                {{-- &nbsp;&nbsp;{{ setting('site.site_name') }} --}}
                            </p>
                            <p class="py-0 my-0 site-slogan">
                                &nbsp;&nbsp;{{ setting('site.site_slogan') }}
                            </p>
                        </div>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-lg-3">
                            <!-- Authentication Links -->
                            @guest
                                @include('eventmie::layouts.guest_header')
                            @else
                                @include('eventmie::layouts.member_header')
                            @endguest

                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('eventmie.venues.index') }}"><i
                                        class="fas fa-map-location"></i> @lang('eventmie-pro::em.venues')</a>
                            </li> --}}

                            {{-- Common Header --}}
                            {{-- categories menu items --}}

                            {{-- @php $categoriesMenu = categoriesMenu() @endphp
                            @if (!empty($categoriesMenu))

                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                            class="fas fa-bars-staggered"></i>
                                        @lang('eventmie-pro::em.categories')&nbsp;<i class="fas fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach ($categoriesMenu as $val)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('eventmie.events_index', ['category' => urlencode($val->name)]) }}">
                                                    {{ $val->name }}
                                                </a>

                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                            @endif --}}

                            {{-- additional header menu items --}}
                            @php $headerMenuItems = headerMenu() @endphp
                            @if (!empty($headerMenuItems))
                                <li class="nav-item dropdown ">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle nav-item dropdown"
                                        href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false" v-pre><i class="fas fa-grip-vertical"></i>
                                        @lang('eventmie-pro::em.more') &nbsp;<i class="fas fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu  nav-item dropdown">
                                        @foreach ($headerMenuItems as $parentItem)
                                            @if (!empty($parentItem->submenu))
                                                <li class="nav-item dropdown">
                                                    <a disabled class="dropdown-item disabled" data-toggle="dropdown"
                                                        role="button" aria-haspopup="true" aria-expanded="false"><i
                                                            class="{{ $parentItem->icon_class }}"></i>
                                                        {{ $parentItem->title }} &nbsp;&nbsp;<i
                                                            class="fas fa-angle-right"></i></a>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($parentItem->submenu as $childItem)
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    target="{{ $childItem->target }}"
                                                                    href="{{ $childItem->url }}">
                                                                    <i class="{{ $childItem->icon_class }}"></i>
                                                                    {{ $childItem->title }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item" target="{{ $parentItem->target }}"
                                                        href="{{ $parentItem->url }}">
                                                        <i class="{{ $parentItem->icon_class }}"></i>
                                                        {{ $parentItem->title }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                        </ul>

                        <a href="{{ route('eventmie.events_index') }}"
                            class="btn btn-warning d-none d-lg-block"  >
                            <i class="fas fa-calendar-day"></i> @lang('eventmie-pro::em.browse_events')
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
