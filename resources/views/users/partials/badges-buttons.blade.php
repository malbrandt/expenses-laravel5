<ul class="list-unstyled">
    <li class="form-group">
        <a href="{{url('payments/user', $user['id'])}}" class="btn btn-primary">
            <i class="fa fa-money"></i> All
            <span class="badge badge-default">
                {{ $user['counts']['payments']['all'] }}
            </span>
        </a>
    </li>
    <li class="form-group">
        <a href="{{route('payments.user.status', [$user['id'], 'rejected'])}}" class="btn btn-info">
            <i class="fa fa-clock-o"></i> Pending
            <span class="badge badge-default">
                {{ $user['counts']['payments']['pending'] }}
            </span>
        </a>
    </li>
    <li class="form-group">
        <a href="{{route('payments.user.status', [$user['id'], 'accepted'])}}" class="btn btn-success">
            <i class="fa fa-thumbs-up"></i> Accepted
            <span class="badge badge-default">
                {{ $user['counts']['payments']['accepted'] }}
            </span>
        </a>
    </li>
    <li class="form-group">
        <a href="{{route('payments.user.status', [$user['id'], 'rejected'])}}" class="btn btn-danger">
            <i class="fa fa-thumbs-down"></i> Rejected
            <span class="badge badge-default">
                {{ $user['counts']['payments']['rejected'] }}
            </span>
        </a>
    </li>
</ul>
