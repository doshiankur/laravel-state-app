<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('Management Villagelibraries', 'Management of Villagelibraries: ', ['class' => 'col-sm-2 control-label']) !!}
                  <!--   <div class="col-sm-8">
                        {!! Form::text('strManagementVillagelibraries', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('strManagementVillagelibraries', '<p class="help-block">:message</p>') !!}
                    </div> -->

                    <div class="col-sm-8">
                        {!! Form::textarea('strManagementVillagelibraries', null, ['class' => 'ckeditor form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$managementofvillagelibraries['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
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
                            <option value="Management of Village Libraries"
                            <?php 
                            if(@$managementofvillagelibraries['strPageName']=='Management of Village Libraries'){?> 
                                selected="selected" <?php }?>>Management of Village Libraries</option>
                            <option value="ગ્રામ ગ્રંથાલયોનું સંચાલન" <?php 
                            if(@$managementofvillagelibraries['strPageName']=='ગ્રામ ગ્રંથાલયોનું સંચાલન'){?> 
                                selected="selected" <?php }?>>ગ્રામ ગ્રંથાલયોનું સંચાલન</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div> 
                

               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/managementofvillagelibraries') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>