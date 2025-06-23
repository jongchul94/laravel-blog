<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#tinymcecontent', // Replace this CSS selector to match the placeholder element for TinyMCE
    skin: localStorage.theme === 'dark' ? 'oxide-dark' : 'oxide',
    content_css: localStorage.theme === 'dark' ? 'dark' : 'default',
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    license_key: 'gpl',
  });
</script>