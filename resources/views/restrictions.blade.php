@extends('layouts.layout')

@section('title')
Restrictions
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-2">Origin</dt>
  			<dd class="col-sm-4">{{$data->origin->name}}</dd>
  			<dt class="col-sm-2">Destination</dt>
  			<dd class="col-sm-4">{{$data->destination->name}}</dd>
  			<dt class="col-sm-2">Authorization Status</dt>
  			<dd class="col-sm-4">{{$data->authorizationStatus}}</dd>
  			<dt class="col-sm-2">Summary</dt>
  			<dd class="col-sm-4">{{$data->summary}}</dd>
  			<dt class="col-sm-2">Details</dt>
  			<dd class="col-sm-4">{{$data->details}}</dd>
  			<dt class="col-sm-2">Start Date</dt>
  			<dd class="col-sm-4">{{$data->startDate}}</dd>
  			<dt class="col-sm-2">End Date</dt>
  			<dd class="col-sm-4">{{$data->endDate}}</dd>
  			<dt class="col-sm-2">Updated at</dt>
  			<dd class="col-sm-4">{{$data->updatedAt}}</dd>
            @foreach($data->requirements as $requirement)
                <dt class="col-sm-2">Category</dt>
                <dd class="col-sm-4">{{$requirement->category->name}}</dd>
                <dt class="col-sm-2">Subcategory</dt>
                <dd class="col-sm-4">{{$requirement->subCategory->name}}</dd>
                <dt class="col-sm-2">Details</dt>
                <dd class="col-sm-4">{{$requirement->details}}</dd>
                <dt class="col-sm-2">Summary</dt>
                <dd class="col-sm-4">{{$requirement->summary}}</dd>
                <dt class="col-sm-2">Start Date</dt>
                <dd class="col-sm-4">{{$requirement->startDate}}</dd>
                <dt class="col-sm-2">End Date</dt>
                <dd class="col-sm-4">{{$requirement->endDate}}</dd>
                @foreach($requirement->documents as $document)
                    <dt class="col-sm-2">Document name</dt>
                    <dd class="col-sm-4">{{$document->name}}</dd>
                    <dt class="col-sm-2">Document url</dt>
                    <dd class="col-sm-4">{{$document->documentUrl}}</dd>
                    <dt class="col-sm-2">Document download</dt>
                    <dd class="col-sm-4">{{$document->downloadUrl}}</dd>
                @endforeach
            @endforeach
  			<dt class="col-sm-2">Info Source</dt>
            <dd class="col-sm-4">{{$data->infoSource}}</dd>
		</dl>
    </div>
</div>
@endsection
