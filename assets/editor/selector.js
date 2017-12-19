var base_url='http://localhost/bdt';
tinymce.init({
  selector: '.editor',
  height: 350,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic image link | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: ''+base_url+'/assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'File Library',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    },
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});