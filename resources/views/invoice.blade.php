@extends('layouts.layout')

@section('title')
Invoice {{ $data->serialNumber }}
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-3">Serial Number</dt>
  			<dd class="col-sm-9">{{$data->serialNumber}}</dd>
  			<dt class="col-sm-3">Profile Id</dt>
  			<dd class="col-sm-9">{{$data->profileId}}</dd>
  			<dt class="col-sm-3">Profile Name</dt>
  			<dd class="col-sm-9">{{$data->profileName}}</dd>
  			<dt class="col-sm-3">Mode</dt>
  			<dd class="col-sm-9">{{$data->mode}}</dd>
  			<dt class="col-sm-3">Status</dt>
  			<dd class="col-sm-9">{{$data->status}}</dd>
  			<dt class="col-sm-3">Issuing Date</dt>
  			<dd class="col-sm-9">{{$data->issuingDate}}</dd>
  			<dt class="col-sm-3">Billing Period</dt>
  			<dd class="col-sm-9">{{$data->billingPeriod}}</dd>
  			<dt class="col-sm-3">From date</dt>
  			<dd class="col-sm-9">{{$data->fromDate}}</dd>
  			<dt class="col-sm-3">To date</dt>
  			<dd class="col-sm-9">{{$data->toDate}}</dd>
  			<dt class="col-sm-3">Due date</dt>
  			<dd class="col-sm-9">{{$data->dueDate}}</dd>
  			<dt class="col-sm-3">Currency</dt>
  			<dd class="col-sm-9">{{$data->currency}}</dd>
  			<dt class="col-sm-3">Total</dt>
  			<dd class="col-sm-9">{{$data->total}}</dd>
  			<dt class="col-sm-3">Reference</dt>
  			<dd class="col-sm-9">{{$data->reference}}</dd>
  			<dt class="col-sm-3">PDF</dt>
  			<dd class="col-sm-9"><a href="{{ $data->pdf }}">{{$data->serialNumber}}</a></dd>
		</dl>
    </div>
</div>
@endsection
