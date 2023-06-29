<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Achievement Title', 'Achievement Title: ', ['class' => 'col-sm-2 control-label','required'=>'required']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strTitle', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('strTitle', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

        

                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$achievement['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        {!! $errors->first('strLanguageCode', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('email', 'Achievement Description: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strDescription', null, ['class' => 'ckeditor form-control']) !!}
                       
                    </div>
                </div>  
                        
                        
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Achievements"
                            <?php 
                            if(@$achievement['strPageName']=='Achievements'){?> 
                                selected="selected" <?php }?>>Achievements</option>
                            <option value="સિધ્ધિઓ" <?php 
                            if(@$achievement['strPageName']=='સિધ્ધિઓ'){?> 
                                selected="selected" <?php }?>>સિધ્ધિઓ</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>     

                
                          


          
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/achievement') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>