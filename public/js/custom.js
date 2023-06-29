$('.dropdown-menu').hide();
$('.navbar-nav').click(function(){
    $('.dropdown-menu').toggle();
});

/*CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;

};*/
CKEDITOR.editorConfig = function (config) {
    // config.language = 'es';
    // config.uiColor = '#F7B42C';
    // config.height = 300;
    // config.toolbarCanCollapse = true;
};

//--- Create Slug Comman Function ----//
function getslug(value){
    var slug = value.replace(/ /g, "-").toLowerCase();
    $('#strSlug').val(slug);
}


function Upload(FileID, Width, Height) {
    var _URL = window.URL || window.webkitURL;

    //Get reference of FileUpload.
    var fileUpload = document.getElementById(FileID);

    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
    if (regex.test(fileUpload.value.toLowerCase())) {

        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;

                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;


                    if (height >= Height && width >= Width) {
                        $('.help-block').text('');
                        return true;
                    }else{
                        $('.help-block').text('Please Select Image Size Width Greater Than '+Width+' Height  Greater Than '+Height);
                        return false;
                    }

                    $('.help-block').text('');
                    return true;

                };
            }
        } else {
            $('.help-block').text('This browser does not support HTML5');
            return false;
        }
    } else {
        $('.help-block').text('Please select a valid Image file.');
        return false;
    }
}

