<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Librarian From', 'Librarian From: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strLibrarianFrom', null, ['class' => 'form-control required','id'=>'strLibrarianFrom']) !!}                       
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$librarianDesk['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        <!-- {!! $errors->first('strLanguageCode', '<p class="help-block">:message</p>') !!} -->
                    </div>
                </div>

                <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="From Librarian's Desk"
                            <?php 
                            if(@$librarianDesk['strPageName']=="From Librarian's Desk"){?> 
                                selected="selected" <?php }?>>From Librarian's Desk</option>
                            <option value="ગ્રંથપાલના ડેસ્ક પરથી" <?php 
                            if(@$librarianDesk['strPageName']=='ગ્રંથપાલના ડેસ્ક પરથી'){?> 
                                selected="selected" <?php }?>>ગ્રંથપાલના ડેસ્ક પરથી</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>

                
                <div class="form-group">
                    {!! Form::label('strLibraryMessage', 'Description: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strLibraryMessage', null, ['class' => 'form-control', 'id' => 'editor1']) !!}                        
                    </div>
                </div>
     
                <div class="form-group">
                    {!! Form::label('strPhoto', 'Select Image *: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strPhoto" class="form-control" id='strPhoto'>
                        <input id="sample_input" type="hidden" name="strPhoto">
                          @if(isset($librarianDesk))
                        <input id="oldImage" type="hidden" name="strPhoto" value={{$librarianDesk->strPhoto}}>     
                        <img src="{{URL::asset('public/upload/librarian/'.$librarianDesk->strPhoto) }}" width="50px" height="50px">                                         
                        @endif
                        
                    </div>
                </div>
          
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/librarian_desk') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>