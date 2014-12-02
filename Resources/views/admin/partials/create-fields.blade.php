<div class="box-body">
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$lang}}">
                        Content
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseOne-{{$lang}}" class="panel-collapse collapse">
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
            </div>
        </div>
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$lang}}">
                        Meta data
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseTwo-{{$lang}}" class="panel-collapse collapse">
                <div class="box-body">
                    <div class='form-group{{ $errors->has("{$lang}[meta_title]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_title]", trans('page::pages.form.meta_title')) !!}
                        {!! Form::text("{$lang}[meta_title]", Input::old("{$lang}[meta_title]"), ['class' => "form-control", 'placeholder' => trans('page::pages.form.meta_title')]) !!}
                        {!! $errors->first("{$lang}[meta_title]", '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}[meta_description]") ? ' has-error' : '' }}'>
                        {!! Form::label("{$lang}[meta_description]", trans('page::pages.form.meta_description')) !!}
                        <textarea name="{{$lang}}[meta_description]" rows="10" cols="80">
                    </textarea>
                        {!! $errors->first("{$lang}[meta_description]", '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
