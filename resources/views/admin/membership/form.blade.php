<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                

                <div class="form-group">
                    {!! Form::label('Query Message', 'Query Message: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strComment', null, ['class' => 'ckeditor form-control']) !!}                   
                      
                    </div>
                </div>
     <input type="hidden" name="membership_id" id="membership_id" value="<?php echo $membership[0]->id;?>">
     <input type="hidden" name="membership_email" id="membership_email" value="<?php echo $membership[0]->strEmail;?>">

<input type="hidden" name="membership_submited_id" id="membership_submited_id" value="<?php echo $membership[0]->strMembershipID;?>">
     
               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/membership') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>