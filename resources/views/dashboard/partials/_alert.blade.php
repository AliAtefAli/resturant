<div>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert" style="text-align: {{lang() == 'ar' ? 'right' : 'left'}};">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" style="float: {{lang() == 'ar' ? 'left' : 'right'}};"><span aria-hidden="true">&times;</span><span class="sr-only" >{{trans('trans.close')}}</span></button>
        </div>
    @endif


    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert" style="text-align: {{lang() == 'ar' ? 'right' : 'left'}};">
            <button type="button" class="close" data-dismiss="alert" style="float: {{lang() == 'ar' ? 'left' : 'right'}};"><span aria-hidden="true">&times;</span><span class="sr-only">{{trans('trans.close')}}</span></button>
            {{ session()->get('error') }}
        </div>
    @endif
</div>


