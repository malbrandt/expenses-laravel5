@if($payment['assent_modified_at'] !== null)
    <span class="table-span-text">{{ $payment['assent_modified_at'] }}</span>
    <span class="table-span-date">
        {{ (new Carbon\Carbon($payment['assent_modified_at']))->diffForHumans(\Carbon\Carbon::now()) }}
    </span>
@endif