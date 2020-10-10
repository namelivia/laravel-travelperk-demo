<div class="mb-3">
    <form name="filteringForm" method="GET" action="{{request()->path()}}">
        <div class="input-group">
            <select id="filterType" onChange="setFilterType()">
                <option value="" selected="selected" disabled>Filter by:</option>
                @foreach ($filteringFields as $field)
                    <option value="{{$field['param']}}">{{$field['name']}}</option>
                @endforeach
            </select>
            <input onChange="setFilter(this)" id="filterValue" value="" disabled="disabled" type="text" class="form-control">
            <input class="btn btn-primary" type="submit" value="Apply filter"/>
        </div>
        @foreach ($filteringFields as $field)
            <input type="hidden" value="{{request()->input($field['param'])}}" name="{{$field['param']}}" id="{{$field['param']}}" />
        @endforeach
    </form>
</div>
<div class="mb-3">
    @if (count(array_filter(request()->input())) > 0)
        <span>Filtering by:</span><br />
        @foreach (array_filter(request()->input()) as $key => $value)
            <b>{{$key}}:</b> {{$value}}<br />
        @endforeach
    @endif
</div>
