@extends('layouts.layout')

@section('title')
Airline Safety Measures
@endsection

@section('content')
<div class="card mb-3">
    <div class="card-body">
     	<dl class="row">
  			<dt class="col-sm-2">Airline Name</dt>
  			<dd class="col-sm-4">{{$data->airline->name}}</dd>
  			<dt class="col-sm-2">Airline Code</dt>
  			<dd class="col-sm-4">{{$data->airline->iataCode}}</dd>
  			<dt class="col-sm-2">Updated at</dt>
  			<dd class="col-sm-4">{{$data->updatedAt}}</dd>
            @foreach($data->safetyMeasures as $safetyMeasure)
                <dt class="col-sm-2">Category</dt>
                <dd class="col-sm-4">{{$safetyMeasure->category->name}}</dd>
                <dt class="col-sm-2">Subcategory</dt>
                <dd class="col-sm-4">{{$safetyMeasure->subCategory->name}}</dd>
                <dt class="col-sm-2">Details</dt>
                <dd class="col-sm-4">{{$safetyMeasure->details}}</dd>
                <dt class="col-sm-2">Summary</dt>
                <dd class="col-sm-4">{{$safetyMeasure->summary}}</dd>
            @endforeach
  			<dt class="col-sm-2">Info Source Name</dt>
            <dd class="col-sm-4">{{$data->infoSource->name}}</dd>
  			<dt class="col-sm-2">Info Source Url</dt>
            <dd class="col-sm-4">
                <a href="{{$data->infoSource->url}}">{{$data->infoSource->url}}</a>
            </dd>
		</dl>
    </div>
</div>
@endsection
