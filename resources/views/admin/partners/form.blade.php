<div class="col-md-12">
    
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New</h3></div>
        </div>

        <div class="form-horizontal">
            <div class="box-body">                            
                
                <div class="form-group">
                    {!! Form::label('PartnerURL', 'PartnerURL: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        {!! Form::text('strPartnerURL', null, ['class' => 'form-control']) !!}
                   
                    </div>
                </div>

             




                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Language:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="strLanguageCode" id="strLanguageCode">
                            <option value="" selected="selected">Select Language</option>
                        @foreach($language as $languages)
                             <option value="{{$languages->strLanguageCode}}" 
                                <?php  if($languages->strLanguageCode==@$partnersDesk['strLanguageCode']){?> selected="selected" <?php }?>>{{$languages->strLanguage}}
                            </option>   
                        @endforeach                               
                        </select>
                    </div>
                </div>

               <div class="form-group">
                    {!! Form::label('strPartnerLogo', 'PartnerLogo *: ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-8">
                        <input type="file" name="strPartnerLogo" class="form-control" id="fileuploadid">
                        <input id="sample_input" type="hidden" name="strPartnerLogo">
                         
          
                        @if(isset($partnersDesk))
                        <input id="oldImage" type="hidden" name="strPartnerLogo" value={{$partnersDesk->strPartnerLogo}}>     
                        <img src="{{ asset('public/upload/partners/'.$partnersDesk->strPartnerLogo) }}" width="50px" height="50px">                                         
                        @endif
          
                    </div>
                </div>
               <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/webpanel/partners') }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>