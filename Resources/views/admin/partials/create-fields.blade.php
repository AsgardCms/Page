<div class="box-body">
    <div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[title]", trans('page::pages.form.title')) !!}
        {!! Form::text("{$lang}[title]", Input::old("{$lang}[title]"), ['class' => "form-control", 'placeholder' => trans('page::pages.form.title')]) !!}
        {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='box-body pad'>
        <textarea class="ckeditor" name="{{$lang}}[body]" rows="10" cols="80">
        </textarea>
    </div>
</div>
