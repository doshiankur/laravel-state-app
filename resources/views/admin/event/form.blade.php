<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }}
                    New Event</h3></div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('strName', 'Name: *', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strName', null, ['class' => 'form-control', 'maxlength' => '60','onblur' =>
                        'Javascript:getslug(this.value)']) !!}
                        </div>
                </div>
                
             
                <div class="form-group">
                    {!! Form::label('txtVenue', 'Venue:* ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('txtVenue', null, ['class' => 'form-control']) !!}
                        </div>
                </div>
<!-- 
                <div class="form-group">
                    {!! Form::label('txtDescription', 'Description:* ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::textarea('txtDescription', null, ['class' => 'form-control', 'id' => 'editor1']) !!}
                        {!! $errors->first('txtDescription', '<p class="help-block">:message</p>') !!}
                    </div>
                </div> -->

             <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$event['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                        {!! $errors->first('strLanguageCode', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>    

            <div class="form-group">
                    {!! Form::label('strImg', 'Select Image *: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strImg" class="form-control" id="fileuploadid">
                        <input id="sample_input" type="hidden" name="strPhoto">
                         
          
                        @if(isset($event))
                        <input id="oldImage" type="hidden" name="strPhoto" value={{$event->strImg}}>     
                        <img src="{{ asset('public/upload/Event/'.$event->strImg) }}" width="50px" height="50px">                                         
                        
                        @endif
                       </div>
            </div>
           
            <div class="form-group">
                     <label class="col-sm-2 control-label">Select Page Name:</label>
                     <div class="col-sm-8">
                    <select class="form-control" name="strPageName" id="strPageName">
                            <option value="" selected="selected">Select Page Name</option>
                            <option value="Photo Gallery"
                            <?php 
                            if(@$event['strPageName']=='Photo Gallery'){?> 
                                selected="selected" <?php }?>>Photo Gallery</option>
                            <option value="ફોટો ગેલેરી" <?php 
                            if(@$event['strPageName']=='ફોટો ગેલેરી'){?> 
                                selected="selected" <?php }?>>ફોટો ગેલેરી</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
            </div>
          <!-- <div class="form-group">
                    {!! Form::label('strPhoto', 'Select Image *: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strImg" class="form-control" id="fileuploadid">
                          <p id="error1" style="display:none; color:#FF0000;" class="help-block">
                         Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
                         </p>
                        <p id="error2" style="display:none; color:#FF0000; " class="help-block">
                        Maximum File Size Limit is 2MB.
                        </p>
                        <input id="sample_input" type="hidden" name="strImg">
                           {!! $errors->first('strImg', '<p class="help-block">:message</p>') !!}
                        @if(isset($event))
                            <input id="oldImage" type="hidden" name="oldImage" value={{$event->strImg}}>
                        @endif
          
                     
          
                    </div>
                </div> -->
          
              <!--   <div class="form-group">
                    {!! Form::label('strImg', 'Image :* ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strImg" class="form-control hide" id="fileuploadid">
                        <p id="error1" style="display:none; color:#FF0000;" class="help-block">
Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
</p>
                        <p id="error2" style="display:none; color:#FF0000; " class="help-block">
                        Maximum File Size Limit is 2MB.
                        </p>
                        <input id="sample_input" type="hidden" name="strImg">
                        {!! $errors->first('strImg', '<p class="help-block">:message</p>') !!}
                        @if(isset($event))
                            <input id="oldImage" type="hidden" name="oldImage" value={{$event->strImg}}>
                        @endif
                    </div>
                </div> -->
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn
                            btn-primary']) !!}
                            <a href="{{ url('/webpanel/event') }}" title="Cancel" class="btn btn-warning"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
