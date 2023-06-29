<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                

               <div class="form-group">
                    {!! Form::label('Member Application Type', 'Member Application Type: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strApplicationType', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('strApplicationType', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                   
               <div class="box-footer"> 
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/member_application_type') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>