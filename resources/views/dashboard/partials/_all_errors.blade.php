@if($errors->any())
    @foreach($errors->all() as $error)
        <div>
            <div class="alert alert-danger" role="alert" style="text-align: {{lang() == 'ar' ? 'right' : 'left'}};">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert"
                        style="float: {{lang() == 'ar' ? 'left' : 'right'}};"><span
                        aria-hidden="true">&times;</span><span
                        class="sr-only">{{trans('trans.close')}}</span></button>
            </div>
        </div>

    @endforeach
@endif
