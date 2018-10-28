@extends('layouts.app')

@section('content-title', 'Home')
@section('content-subtitle', 'Dashboard')

<!--  -->
@section('content')

<div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Pendapatan Berdasarkan Unit</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="line-chart" width="50%" height="40%"></canvas>
            </div>
          </div>
        </div>
        </div>
@endsection