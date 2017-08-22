@if($date)
    <span class="table-span-text">{{ $date }}</span>
    <span class="table-span-date">{{ $date->diffForHumans(Carbon\Carbon::now()) }}</span>
@endif