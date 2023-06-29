<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Book Exchange Title', 'Book Exchange Title: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strBookExchange', null, ['class' => ' ckeditor form-control']) !!}
                       <!--  {!! Form::textarea('str_content', null, ['class' => 'ckeditor form-control', 'required' => 'required']) !!} -->
                        <!-- {!! $errors->first('strBookExchange', '<p class="help-block">:message</p>') !!} -->
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$bookexchange['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
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
                            <option value="Books Issue-Return"
                            <?php 
                            if(@$bookexchange['strPageName']=='Books Issue-Return'){?> 
                                selected="selected" <?php }?>>Books Issue-Return</option>
                            <option value="પુસ્તક આપ-લે" <?php 
                            if(@$bookexchange['strPageName']=='પુસ્તક આપ-લે'){?> 
                                selected="selected" <?php }?>>પુસ્તક આપ-લે</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>     

            
          
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/bookexchanges') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>