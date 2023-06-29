<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="col-xs-11"><h3 class="box-title">{{ isset($submitButtonText) ? $submitButtonText : 'Create' }} New Page</h3></div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="form-horizontal">
            <div class="box-body">
               <!-- <div class="form-group">
                    {!! Form::label('intEventid', 'Event Name: ', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-8">
                        {{ Form::select('intEventid',$eventArray, null, array('class' => 'form-control', 'required' => 'required')) }}
                    </div>
                </div>-->

                <div class="form-group">
                    {!! Form::label('StrEventImg', 'Event Image Tags: ', ['class' => 'col-sm-2 control-label'])                      <div class="col-sm-8">
                        <input type="file" name="strEventImg" class="form-control" id="fileuploadid" >
                        {!! $errors->first('dtiEventdatetime', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary', 'id' => 'btnPageContent']) !!}
                            <a href="{{ url('/webpanel/allPhotoGallery/'.$photogalleryid) }}" title="Cancel" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel</a>
                        </div>
                    </div>
                </div>
                <!-- box-footer -->
            </div>
        </div>
    </div>
</div>
<!-- box-->