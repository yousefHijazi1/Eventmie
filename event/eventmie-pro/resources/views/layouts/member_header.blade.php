{{-- Common between Admin, Customer & Organiser --}}
<li class="nav-item dropdown ">
    @php
        $data = notifications();
    @endphp

    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false" v-pre>
        <span class="position-relative btn btn-sm btn-warning badge">
            <i class="fas fa-bell text-white"> </i>
            @if ($data['total_notify'] > 0)
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"></span>
            @endif
        </span>
        <i class="fas fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="blogDropdown">
        @if (!empty($data['notifications']))
            @foreach ($data['notifications'] as $notification)
                <li class="nav-item dropdown">
                    <a class="dropdown-item" href="{{ route('eventmie.notify_read', [$notification->n_type]) }}">
                        {{ $notification->total }}
                        @if ($notification->n_type == 'user')
                            @lang('eventmie-pro::em.user')
                        @elseif($notification->n_type == 'cancel')
                            @lang('eventmie-pro::em.booking_cancellation')
                        @elseif($notification->n_type == 'review')
                            @lang('eventmie-pro::em.show_reviews')
                        @elseif($notification->n_type == 'contact')
                            @lang('eventmie-pro::em.contact')
                        @elseif($notification->n_type == 'events')
                            @lang('eventmie-pro::em.event')
                        @elseif($notification->n_type == 'Approve-Organizer')
                            @lang('eventmie-pro::em.requested_to_become_organiser')
                        @elseif($notification->n_type == 'Approved-Organizer')
                            @lang('eventmie-pro::em.became_organiser_successful')
                        @elseif($notification->n_type == 'bookings')
                            @lang('eventmie-pro::em.booking')
                        @elseif($notification->n_type == 'forgot_password')
                            @lang('eventmie-pro::em.reset_password')
                        @endif
                    </a>
                </li>
            @endforeach
        @else
            <li class="nav-item dropdown">
                <a class="dropdown-item"> @lang('eventmie-pro::em.no_notifications')</a>
            </li>
        @endif
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false" v-pre>
        @if (Auth::user()->hasRole('customer'))
            <i class="fas fa-user-circle"></i>
        @elseif(Auth::user()->hasRole('organiser'))
            <i class="fas fa-person-booth"></i>
        @else
            <i class="fas fa-user-shield"></i>
        @endif

        {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="blogDropdown">

        {{-- Customer --}}
        @if (Auth::user()->hasRole('customer'))
        <li class="nav-item dropdown ">
            <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i>
                @lang('eventmie-pro::em.profile')</a>
        </li>
        <li class="nav-item dropdown ">
            <a class="dropdown-item" href="{{ route('eventmie.mybookings_index') }}"><i
                    class="fas fa-money-check-alt"></i> @lang('eventmie-pro::em.mybookings')</a>
        </li>
        <li class="nav-item dropdown ">
            <a class="dropdown-item" href="{{ route('eventmie.profile') }}#/becomeOrganiser"><i class="fas fa-person-booth"></i>
                @lang('eventmie-pro::em.become_organiser')</a>
        </li>
        @endif

        {{-- Organiser --}}
        @if (Auth::user()->hasRole('organiser'))
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i>
                @lang('eventmie-pro::em.profile')</a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.o_dashboard') }}"><i
                    class="fas fa-tachometer-alt"></i> @lang('eventmie-pro::em.dashboard')</a>
        </li>
        @endif

        {{-- Admin --}}
        @if (Auth::user()->hasRole('admin'))
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ eventmie_url() . '/' . config('eventmie.route.admin_prefix') }}"><i
                    class="fas fa-tachometer-alt"></i> @lang('eventmie-pro::em.admin_panel')</a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.profile') }}"><i class="fas fa-id-card"></i>
                @lang('eventmie-pro::em.profile')</a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.ticket_scan') }}"><i class="fas fa-qrcode"></i>
                @lang('eventmie-pro::em.scan_ticket')</a>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.myevents_form') }}"><i
                    class="fas fa-calendar-plus"></i> @lang('eventmie-pro::em.create_event')</a>
        </li>
        @endif

        <li class="nav-item dropdown">
            <a class="dropdown-item" href="{{ route('eventmie.logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> @lang('eventmie-pro::em.logout')
            </a>
            <form id="logout-form" action="{{ route('eventmie.logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </li>

    </ul>
</li>



{{-- Admin --}}
@if (Auth::user()->hasRole('admin'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('eventmie.ticket_scan') }}"><i class="fas fa-qrcode"></i>
            @lang('eventmie-pro::em.scan_ticket')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('eventmie.myevents_form') }}"><i class="fas fa-calendar-plus"></i>
            @lang('eventmie-pro::em.create_event')</a>
    </li>
@endif

{{-- Organiser --}}
@if (Auth::user()->hasRole('organiser'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('eventmie.ticket_scan') }}"><i class="fas fa-qrcode"></i>
            @lang('eventmie-pro::em.scan_ticket')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('eventmie.myevents_form') }}"><i class="fas fa-calendar-plus"></i>
            @lang('eventmie-pro::em.create_event')</a>
    </li>
@endif

{{-- Customer --}}
@if (Auth::user()->hasRole('customer'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('eventmie.mybookings_index') }}"><i class="fas fa-money-check-alt"></i>
            @lang('eventmie-pro::em.mybookings')</a>
    </li>
@endif
