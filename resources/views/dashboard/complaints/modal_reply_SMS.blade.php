<div class="modal fade" id="replySMS-{{$complaint->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('dashboard.messages.SMS Reply') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.complaint.replySMS', $complaint->id ) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <textarea class="form-control answer" name="answer"></textarea>
                    </div>

                    <button class="btn btn-success">{{ trans('dashboard.messages.Reply') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
