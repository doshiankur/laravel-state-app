<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Month', 'Month : ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strMonths', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('strMonths', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

               
                <div class="form-group">
                    {!! Form::label('Title', 'Title: ', ['class' => 'col-sm-2 control-label']) !!}
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
                                <?php  if($languages->strLanguageCode==@$programcalender['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        {!! $errors->first('strLanguageCode', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                 <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Programme Calendar – 2022"
                            <?php 
                            if(@$programcalender['strPageName']=='Programme Calendar – 2022'){?> 
                                selected="selected" <?php }?>>Programme Calendar – 2022</option>
                            <option value="કાર્યક્રમ કેલેન્ડર – ૨૦૨૨" <?php 
                            if(@$programcalender['strPageName']=='કાર્યક્રમ કેલેન્ડર – ૨૦૨૨'){?> 
                                selected="selected" <?php }?>>કાર્યક્રમ કેલેન્ડર – ૨૦૨૨</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                  </div> 

                
               
               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/programcalender') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>