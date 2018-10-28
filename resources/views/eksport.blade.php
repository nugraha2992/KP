@extends('layouts.app')
@section('content-title', 'Data Export')
@section('content-subtitle', 'Detail')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Eksport Data</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12" >

            <div class="col-xs-12 col-sm-12 col-md-12">
            <!-- <div class="form-group pull-right">    
                <span><Label class="baru">Cari Dari:</Label><input type="text" class="form-control form-inline" name="daterange" value="01/01/2018 - 01/12/2018" /></span>
            </div> -->
            </div>
            </div>
            </div>
            <div class="box-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Kelola Export</h2>
                    </div>
                  
                </div>
                <table class="table table-bordered" border="3">
                    <tr>
                        <th>No</th>
                        <th>Nama Unit</th>
                        <th>Jumlah NOA</th>
                        <th>Lending OS</th>
                        <th>Lending OS-B1</th>
                        <th>@PAR</th>
                        <th>@PAR-B1</th>
                        <th>NPL</th>
                        <th>OS NPL</th>
                        <th>NPL-B1</th>
                        <th>Lending KOL</th>
                        <th>KOL-B1</th>
                        <th>KOL</th>
                    </tr>
                    @foreach ($dataTotal as  $key => $w )
                    <tr>
                        <th>{{ $i++ }}</th>
                        <th>{{ $w['NamaUnit'] }}</th>
                        <th>Jumlah NOA</th>
                        <th>Lending OS</th>
                        <th>Lending OS-B1</th>
                        <th>@PAR</th>
                        <th>@PAR-B1</th>
                        <th>NPL</th>
                        <th>OS NPL</th>
                        <th>NPL-B1</th>
                        <th>Lending KOL</th>
                        <th>KOL-B1</th>
                        <th>KOL</th>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
<style>
.ui-datepicker {
    /*background: transparent;*/
    background: blue;
}
</style>
@endsection
