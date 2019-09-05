{!! Form::open(['route' => isset($model) ? ["users.update",$model->id] : ["users.store"], 'method' => isset($model) ? 'put' : 'post', 'autocomplete'=>"false","enctype"=>'multipart/form-data']) !!}

<div class="form-group">
{!! Form::label('name', 'Name') !!}
{!! Form::text('name', isset($model) ? $model->name : null , $errors->has('name') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control']) !!}
{!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
</div>

<div class="form-group">
{!! Form::label('email', 'Email') !!}
{!! Form::text('email', isset($model) ? $model->email : null , $errors->has('email') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control']) !!}
{!! $errors->first('email', '<p class="help-block invalid-feedback">:message</p>') !!}
</div>

<div class="form-group">
{!! Form::label('password', 'Password') !!}
{!! Form::text('password', null , $errors->has('password') ? ['class'=>'form-control is-invalid'] : ['class'=>'form-control']) !!}
{!! $errors->first('password', '<p class="help-block invalid-feedback">:message</p>') !!}
</div>
{{-- 
<div class="block-content block-content-full text-right border-top">
    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary  btn-block']) !!}
</div> --}}

{!! Form::close() !!}