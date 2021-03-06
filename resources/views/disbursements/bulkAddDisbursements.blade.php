@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="card bg-light col-md-6 mt-3 ml-auto mr-auto">
                <div class="card-content text-center">
                    <div class="card-title">Upload Bulk Disburments</div>
                    <form action="{{ action('DisbursementsController@getDisbursementsValidate') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="file-field input-field">
                            <div class="btn">
                              <span id="filespan">Upload</span>
                              <span id="filestate"></span>
                              <input name="file" accept=".csv" type="file" id="file">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>
                        <div class="">
                            <button type="submit" class="btn">Validate Data</button>
                            <a class="btn" href="{{ url('disbursements/exporttemplate') }}">Download Template
                            </a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
    @stop
    @push('script')
    <script>
      $(document).ready(function(){
       $(document).on('change', '#file', function(){
        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);

         form_data.append("file", document.getElementById('file').files[0]);
         $.ajax({
          url:"/disbursements/bulkvalidate",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function(){
           $('#filestate').html("<label class='text-success'>File Uploading...</label>");
          },   
          success:function(data)
          {
           $('#filestate').html(data);
          }
         });
       });
      });
      </script>
    @endpush
