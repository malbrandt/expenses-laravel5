<?php
if (isset($expense)) {
    $moderated = $expense->hasModeratedPayments();
} elseif (isset($payments) && count($payments) > 0) {
    $moderated = $payments[0]->expense()->first()->hasModeratedPayments();
} ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Payments
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover table-striped">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Moderated at</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                    @role('admin')
                    <th>Moderate</th>
                    @endrole
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Moderated at</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                    @role('admin')
                    <th>Moderate</th>
                    @endrole
                </tr>
                </tfoot>
                <tbody>
                @foreach($payments as $payment)
                    <?php /** @var \App\Payment $payment */ ?>
                    <tr class="{{ !$payment->isModerated() ?: ($payment->isApproved() ? 'table-success' : 'table-danger') }}">
                        <td>{{ $payment['amount'] }}</td>
                        <td>@include('payments.partials.badge')</td>
                        <td>@include('payments.partials.moderated_at')</td>
                        <td>
                            @include('partials.datediff', ['date' => $payment['created_at']])
                        </td>
                        <td>
                            @include('partials.datediff', ['date' => $payment['updated_at']])
                        </td>
                        <td class="no-sort">
                            {{-- Actions --}}
                            @include('payments.actions')
                        </td>
                        @role('admin')
                        <td class="no-sort">
                            @include('payments.partials.moderate_actions')
                        </td>
                        @endrole
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Payments
    </div>
</div>
@include('partials.datatable')