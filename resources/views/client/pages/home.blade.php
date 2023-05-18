@extends('client.master')

@section('content')
@include('client.pages.thanh_phan.banner')
<div class="main_content">
    @include('client.pages.thanh_phan.hot_deal')
    @include('client.pages.thanh_phan.exclusive_products')
    @include('client.pages.thanh_phan.banner_2')
    {{-- @include('client.pages.thanh_phan.trending_product') --}}
    @include('client.pages.thanh_phan.logo')
    @include('client.pages.thanh_phan.featured_products')
    @include('client.pages.thanh_phan.contact')
</div>
@endsection
