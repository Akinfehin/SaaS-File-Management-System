 <!-- Modal -->
<div class="modal fade" id="add_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="showx" style="font-weight: bold;font-size: 12px!important;padding-top: 4px!important"></h6>&nbsp;{ Your file }
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="msgs"></div>
     <div class="card-body px-lg-5 pt-0">
        <form method="post" enctype="multipart/form-data" >
           <input type="file" id="file_name" required=""><br>
           <input type="hidden" id="f_name"  class="form-control">
           <input type="hidden" id="folder_name" name="">
           <input type="hidden" id="get_id" name="">
           <input type="hidden" id="log_name" name="">       
          <button  type="button" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0" id="addsubfile">UPLOAD</button>
          <footer style="font-size: 11px"><b>File Type:</b><font color="red"><i>.docx .doc .pptx .ppt .xlsx .xls .pdf .odt</i></font></footer>

       </div>
      </form>
    </div>
  </div>
</div>

    <script type="text/javascript">
   $(document).ready(function() {
   
    document.getElementById("addsubfile").addEventListener("click", (e) =>{
     e.preventDefault();


      const folder_name = document.querySelector('input[id=folder_name]').value;
      console.log('==============folder_name==============');
      console.log(folder_name);

      const file_name = document.querySelector('input[id=file_name]').value;
      console.log('==============file_name==============');
      console.log(file_name);

      const full_name = document.querySelector('input[id=f_name]').value;
      console.log('==============full_name==============');
      console.log(full_name);

      const ID = document.querySelector('input[id=get_id]').value;
      console.log('==============ID==============');
      console.log(ID);
   



         var delay = 100;
               var data = new FormData(this.form);
               data.append('file_name', $('#file_name')[0].files[0]);
               data.append('full_name', full_name);
               data.append('folder_name', folder_name);
              // data.append('login_id', login_id);
               data.append('ID', ID);

   
            $.ajax({
                url: 'addfilesub_process.php',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
   
                async: false,
                cache: false,
   
                success: function(data) {
                    setTimeout(function() {
                        $('#msgs').html(data);
                    }, delay);
                   setTimeout(location.reload.bind(location), 200);
   
                },
                error: function(data) {
                    console.log("Failed");
                }
            });
   
        });
    });
</script>

