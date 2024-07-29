<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>
        @section('title')
            {{ config('app.name') }}
        @show
    </title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"/>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"
    />
    <link
        href="{{ Vite::asset('resources/plugins/global/plugins.bundle.css') }}"
        rel="stylesheet"
        type="text/css"
    />
    <link href="{{ Vite::asset('resources/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <style href="{{ Vite::asset('resources/css/custom.css') }}"></style>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @stack('style')
</head>

<body
    id="kt_app_body"
    data-kt-app-layout="dark-sidebar"
    data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true"
    data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true"
    data-kt-app-toolbar-enabled="true"
    class="app-default dark-sidebar"
>
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!-- Page -->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--Header-->
        @include('admin.blocks.header')
        <!--end::Header-->

        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
            @include('admin.blocks.sidebar')
            <!--end::Sidebar-->

            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                @yield('content')

                <!--begin::Footer-->
                @include('admin.blocks.footer')
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>

<!--begin::Chat drawer-->
@include('admin.blocks.chat')
<!--end::Chat drawer-->

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ Vite::asset('resources/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ Vite::asset('resources/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

@stack('script')
</body>
</html>
