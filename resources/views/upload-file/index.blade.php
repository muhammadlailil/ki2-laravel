<form action="{{url('upload-file')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file_upload" id="">
    <button type="submit">SUBMIT</button>
</form>