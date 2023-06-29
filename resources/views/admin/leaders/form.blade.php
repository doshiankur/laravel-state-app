<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Leaders Name', 'Leaders Name: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strLeadersName', null, ['class' => 'form-control']) !!}
                       
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Leaders Designation', 'Leaders Designation: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strDesignation', null, ['class' => 'form-control']) !!}
                       
                    </div>
                </div>


                 <div class="form-group">
                    {!! Form::label('Leaders Place', 'Leaders Place: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strPlace', null, ['class' => 'form-control']) !!}
                        
                    </div>
                </div>




                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$leadersDesk['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                       
                    </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Leaders"
                            <?php 
                            if(@$leadersDesk['strPageName']=='Leaders'){?> 
                                selected="selected" <?php }?>>Leaders</option>
                            <option value="નેતાઓ" <?php 
                            if(@$leadersDesk['strPageName']=='નેતાઓ'){?> 
                                selected="selected" <?php }?>>નેતાઓ</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>  

               <div class="form-group">
                    {!! Form::label('strLeadersPhoto', 'Select Image *: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strLeadersPhoto" class="form-control" id="fileuploadid">
                        <input id="sample_input" type="hidden" name="strLeadersPhoto">
                         
          
                        @if(isset($leadersDesk))
                        <input id="oldImage" type="hidden" name="strLeadersPhoto" value={{$leadersDesk->strLeadersPhoto}}>     
                        <img src="{{ asset("public/upload/leaders/$leadersDesk->strLeadersPhoto") }}" width="50px" height="50px">                                         
                        @endif
                        
                    </div>
                </div>

               <div class="form-group">
                    {!! Form::label('Leaders Order', 'Leaders Order: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('intDisplay', null, ['class' => 'form-control']) !!}
                        
                    </div>
                </div>








               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/leaders') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>