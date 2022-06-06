@extends('adminlte::page')

@section('title', 'Update Pengiriman')

@section('content_header')
    <h1 class="m-0 text-dark">Update Pengiriman</h1>
@stop
@section('content')

@section('content')
<div class="container-fluid">
<div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pengiriman.index') }}"> Back</a>
        </div>
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Update Pengiriman</h3>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="table-responsive">
            <table class="table">
            <form action="{{ route('pengiriman.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        
              <tbody>
                <tr>
                  <td>
                    Cart ID
                  </td>
                  <td>
                  <input type="hidden" name="user_id" id="user_id" value="{{ $itemorder->cart->user_id }}">
                  <input type="hidden" name="cart_id" id="est" value="{{ $itemorder->cart_id }}">
                    {{ $itemorder->cart_id }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Estimasi
                  </td>
                  <td>
                  <input type="text" name="estimasi" id="est" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>
                    Tanggal Pengiriman
                  </td>
                  <td>
                    <input type="date" name="tgl_pengiriman" id="tgl" class="form-control">
                  </td>
                </tr>
                  <td>
                    Status Pengiriman
                  </td>
                  <td>
                    <select name="status" id="status" class="form-control">
                      <option value="sudah">Sudah</option>
                      <option value="belum">Belum</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </td>
                </tr>
              </tbody>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection