<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="form-horizontal">
            <div class="box-body">                            
              <div class="form-group">
                   <!--  {!! Form::label('name', 'Language: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strLanguage', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('str_language', '<p class="help-block">:message</p>') !!}
                    </div> -->
                     <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$announcement['strLanguage']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        {!! $errors->first('strLanguageCode', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'content: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('str_content', null, ['class' => 'ckeditor form-control', 'required' => 'required']) !!}
                      
                        
                       
                       
                        {!! $errors->first('str_content', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ url('/webpanel/announcement') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>
