<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('MissionVisions Title', 'MissionVisions Title: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strTitle', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('strTitle', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('MissionVission Description', 'MissionVission Description: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strMissionVission', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('strMissionVission','<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$mission['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
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
                            <option value="Mission and Vision"
                            <?php 
                            if(@$mission['strPageName']=='Mission and Vision'){?> 
                                selected="selected" <?php }?>>Mission and Vision</option>
                            <option value="મિશન અને વિઝન" <?php 
                            if(@$mission['strPageName']=='મિશન અને વિઝન'){?> 
                                selected="selected" <?php }?>>મિશન અને વિઝન</option>
                    </select> 
                     {!! $errors->first('strPageName', '<p class="help-block">:message</p>') !!}
                    </div>                         
                </div>    

               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/missionvisions') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>