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
                                <?php  if($languages->strLanguageCode==@$referenceservice['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        
                        </select>
                       
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('strReferenceService', 'content: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('strReferenceService', null, ['class' => 'ckeditor form-control']) !!}

                    </div>
                </div>


            <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Reference Services"
                            <?php 
                            if(@$referenceservice['strPageName']=='Reference Services'){?> 
                                selected="selected" <?php }?>>Reference Services</option>
                            <option value="સંદર્ભ સેવા" <?php 
                            if(@$referenceservice['strPageName']=='સંદર્ભ સેવા'){?> 
                                selected="selected" <?php }?>>સંદર્ભ સેવા</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
            </div>  









            <!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ url('/webpanel/referenceservice') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>
