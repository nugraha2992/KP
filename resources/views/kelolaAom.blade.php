@extends('layouts.app')
@section('content-title', 'Data AOM')
@section('content-subtitle', 'Detail')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Peringkat AOM Berdasarkan Jumlah Plafond</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12" >

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-right">    
                <span><Label class="baru">Cari Dari:</Label><input type="text" class="form-control form-inline" name="daterange" value="01/01/2018 - 01/12/2018" /></span>
            </div>
            </div>
            </div>
            </div>
            <div class="box-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Kelola AOM</h2>
                    </div>
                    @hasrole('admin')
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('emailaom',['awal'=> $awal,'akhir'=>$akhir]) }}"> Kirim Email Ke Semua</a>
                    </div>
                    @endhasrole
                </div>
                <table class="table table-bordered" border="3">
                    <tr>
                        <th>No</th>
                        <th>ID AOM</th>
                        <th>Jumlah NOA</th>
                        <th>Jumlah Plafond</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->aom }}</td>
                        <td>{{ $user->noa }}</td>
                        <td>{{ "Rp. ". number_format($user->jumlah, 2) }}</td>
                    </tr>
                    @endforeach
                </table>
                {{ $data->links() }} 
                 @hasrole('admin')
                    <div class="pull-right">
                        <a class="btn btn-info" target="_blank" href="{{ route('cetakpdf',['awal'=> $awal,'akhir'=>$akhir]) }}"> Ekspor ke PDF</a>
                    </div>
                    @endhasrole
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
