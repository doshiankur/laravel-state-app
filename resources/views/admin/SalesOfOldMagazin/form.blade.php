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
                        {!! Form::text('strLanguage', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('str_language', '<p class="help-block">:message</p>') !!}
                    </div> -->
                     <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$saleofoldmagazines['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('strSaleofOldMagazines', 'Content: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                    {!! Form::textarea('strSaleofOldMagazines', null, ['class' => 'ckeditor form-control']) !!}                    
                    </div>
                </div>
               
                <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Sale of Old Magazine"
                            <?php 
                            if(@$saleofoldmagazines['strPageName']=='Sale of Old Magazine'){?> 
                                selected="selected" <?php }?>>Sale of Old Magazine</option>
                            <option value="જૂના સામાયિકોનું વેચાણ" <?php 
                            if(@$saleofoldmagazines['strPageName']=='જૂના સામાયિકોનું વેચાણ'){?> 
                                selected="selected" <?php }?>>જૂના સામાયિકોનું વેચાણ</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
            </div>  



            <!-- /.box-body -->
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4">
                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ url('/webpanel/saleofoldmagazines') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
            </div>
        </div>
    </div>
    <!-- /.box -->
</div>
