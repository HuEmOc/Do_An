function ckeditor (name) {
    var editor = CKEDITOR.replace(name ,{
        language:'vi',
        filebrowserImageBrowseUrl : baseURL+'/public/backend/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : baseURL+'/public/backend/ckfinder/ckfinder.html?Type=Flash',
        filebrowserImageUploadUrl : baseURL+'/public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : baseURL+'/public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        height: '250px',
        });
}