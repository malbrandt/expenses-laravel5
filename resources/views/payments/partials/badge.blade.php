@if($payment['assent'] > 0)
    <span class="badge badge-success">Approved</span>
@elseif($payment['assent'] < 0)
    <span class="badge badge-danger">Rejected</span>
@else
    <span class="badge badge-info">Pending</span>
@endif