@if ($errors->has($input))
    <span class="help-block row"
          style="float:{{lang() == 'ar' ? 'left' : 'right'}}; padding{{lang() == 'ar' ? '-right' : '-left'}}: 35px;">
            <strong style="color: red;">{{ $errors->first($input) }}</strong>
    </span>
@endif

