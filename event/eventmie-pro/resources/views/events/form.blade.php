@extends('eventmie::o_dashboard.index')

{{-- Page title --}}
@section('title')
    @if (empty($event))
        @lang('eventmie-pro::em.create_event')
    @else
        @lang('eventmie-pro::em.update_event')
    @endif
@endsection


@section('o_dashboard')
<div class="container-fluid my-2">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between p-4 bg-white border-bottom-0">
                    <div>
                        <h1 class="mb-0 fw-bold h2">
                            @if (empty($event))
                                @lang('eventmie-pro::em.create_event')
                            @else
                                @lang('eventmie-pro::em.update_event') - {{ $event->title }}
                            @endif
                        </h1>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-secondary btn-block" href="{{ route('eventmie.myevents_index') }}"><span><i class="fas fa-xmark"></i> @lang('eventmie-pro::em.cancel')</span></a>  
                    </div>
                </div>

                <div class="bg-light">
                    <tabs-component
                        :is_publishable="{{ !empty($event->is_publishable) ? $event->is_publishable : '{}' }}"
                        :event_id="{{ !empty($event) ? $event->id : 0 }}" :organiser_id="{{ $organiser_id }}"
                        :event_ck="{{ json_encode($event, JSON_HEX_APOS) }}"></tabs-component>
                </div>
            
                <!-- Card body -->
                <div class="card-body p-4">
                    <router-view :is_admin="{{ json_encode(Auth::user()->hasRole('admin')) }}"
                        :organisers="{{ json_encode($organisers, JSON_HEX_APOS) }}"
                        :organiser_id="{{ $organiser_id }}"
                        :event_ck="{{ json_encode($event, JSON_HEX_APOS) }}"
                        :selected_organiser="{{ json_encode($selected_organiser, JSON_HEX_APOS) }}"
                        :server_timezone="{{ json_encode(setting('regional.timezone_default'), JSON_HEX_APOS) }}">

                    </router-view>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    var is_event_id = {!! !empty($event) ? $event->id : 0 !!};
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ setting('apps.google_map_key') }}&libraries=places">
</script>
<script type="text/javascript" src="{{ eventmie_asset('js/events_manage.js') }}"></script>
@stop
