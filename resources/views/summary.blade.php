@extends('layouts.layout')

@section('title')
Local Summary
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-2">Location</dt>
  			<dd class="col-sm-4">{{$data->location->name}}</dd>
  			<dt class="col-sm-2">Summary</dt>
  			<dd class="col-sm-4">{{$data->summary}}</dd>
  			<dt class="col-sm-2">Risk level</dt>
  			<dd class="col-sm-4">{{$data->riskLevel->name}}</dd>
  			<dt class="col-sm-2">Risk level details</dt>
  			<dd class="col-sm-4">{{$data->riskLevel->details}}</dd>
  			<dt class="col-sm-2">Details</dt>
  			<dd class="col-sm-4">{{$data->details}}</dd>
  			<dt class="col-sm-2">Updated at</dt>
  			<dd class="col-sm-4">{{$data->updatedAt}}</dd>
            @foreach($data->guidelines as $guideline)
                <dt class="col-sm-2">Category</dt>
                <dd class="col-sm-4">{{$guideline->category->name}}</dd>
                <dt class="col-sm-2">Subcategory</dt>
                <dd class="col-sm-4">{{$guideline->subCategory->name}}</dd>
                <dt class="col-sm-2">Details</dt>
                <dd class="col-sm-4">{{$guideline->details}}</dd>
                <dt class="col-sm-2">Summary</dt>
                <dd class="col-sm-4">{{$guideline->summary}}</dd>
                <dt class="col-sm-2">Severity</dt>
                <dd class="col-sm-4">{{$guideline->severity}}</dd>
            @endforeach
  			<dt class="col-sm-2">Info Source</dt>
            <dd class="col-sm-4">{{$data->infoSource}}</dd>
		</dl>
    </div>
</div>
@endsection
