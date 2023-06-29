<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Upcoming Events Title', 'Upcoming Events Title: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strEventTitile', null, ['class' => 'form-control', 'required' => 'required']) !!}
                      
                    </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('Upcoming Events Date', 'Upcoming Events Date: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('dtiEventDate', null, ['class' => 'form-control',
                        'id'=>'datepicker','data-date-format'=>"dd/mm/yyyy",'autocomplete'=>'off','required' => 'required']) !!}
                       
                    </div>
                </div>
               
               <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Upcoming Event"
                            <?php 
                            if(@$upcoming_events['strPageName']=="Upcoming Event"){?> 
                                selected="selected" <?php }?>>Upcoming Event</option>
                            <option value="આગામી ઇવેન્ટ" <?php 
                            if(@$upcoming_events['strPageName']=='આગામી ઇવેન્ટ'){?> 
                                selected="selected" <?php }?>>આગામી ઇવેન્ટ</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>

             




                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$upcoming_events['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        

                      
                    </div>
                </div>
                    <div class="form-group">
                    {!! Form::label('email', 'Upcoming Events Description: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strEventDescription', null, ['class' => 'ckeditor form-control']) !!}                   
                      
                    </div>
                </div>
               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/upcoming_event') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>