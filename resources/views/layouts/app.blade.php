@extends('admin-lte::layouts.main')

@if (auth()->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@endif

@section('breadcrumbs')
@include('admin-lte::layouts.content-wrapper.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])
@endsection

@section('sidebar-menu')
<ul class="sidebar-menu">
   <li class="header">MAIN NAVIGATOR</li>
@hasrole('bisnis')
  <li>
    <a href="{{ route('home') }}">
      <i class="fa fa-area-chart"></i>
      <span>Kelola Statistik</span>
    </a>
  </li>
  <li>
    <a href="{{ route('geolokasi') }}">
      <i class="fa fa-map-marker"></i>
      <span>Kelola Geolokasi</span>
    </a>
  </li>
  <li>
    <a href="{{ route('home') }}">
      <i class="fa  fa-download"></i>
      <span>Eksport Data</span>
    </a>
  </li>
@endhasrole
  @hasrole('admin')
  <li>
    <a href="{{ route('users.index') }}">
      <i class="fa fa-user"></i>
      <span>Kelola Pengguna</span>
    </a>
  </li>
  <li>
    <a href="{{ route('aom') }}">
      <i class="fa fa-user"></i>
      <span>Kelola AOM</span>
    </a>
  </li>
  <li>
    <a href="{{ route('keloladata.index') }}">
      <i class="fa fa-user"></i>
      <span>Kelola Import Data</span>
    </a>
  </li>
  @endhasrole

  @hasrole('AOM')
  <li>
    <a href="{{ route('aom') }}">
      <i class="fa fa-user"></i>
      <span>Kelola AOM</span>
    </a>
  </li>
  @endhasrole
</ul>
  
@endsection
