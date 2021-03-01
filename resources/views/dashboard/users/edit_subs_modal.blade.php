<div class="modal fade" id="edit-{{$subscription->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard.subscriptions.Edit Subscription') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.subscriptions.editSubs', $subscription->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="date" name="end_date" style="width: 70%"  class="pickadate-disable-weekday form-control" min="{{ \Carbon\Carbon::parse($subscription->end_date)->toDateString() }}" value="{{ \Carbon\Carbon::parse($subscription->end_date)->toDateString() }}">
                    </div>
                    <button class="btn btn-success">{{ trans('dashboard.edit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>