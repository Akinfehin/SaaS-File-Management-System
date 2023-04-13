 <!-- Modal -->
<div class="modal fade" id="Subfolder3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="show" style="font-weight: bold;font-size: 12px!important;padding-top: 4px!important">&nbsp;{ Sub folder }</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div id="msgx"></div>
     <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
      <div class="modal-body">
        <input type="hidden"  id="folder_name2" class="form-control" placeholder="Folder Name..">
        <input type="text"  id="sub_name" class="form-control" placeholder="Add Sub Folder">
      </div>
      <div class="modal-footer">

         <input type="hidden"  id="sub_id2">
         <input type="hidden" name="" id="full_name">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" id="sub2">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
   $(document).ready(function() {
   
    document.getElementById("sub2").addEventListener("click", (e) =>{
     e.preventDefault();

      const folder_name = document.querySelector('input[id=folder_name2]').value;
      console.log('==============folder_name==============');
      console.log(folder_name);


      const sub_name = document.querySelector('input[id=sub_name]').value;
      console.log('==============sub_name==============');
      console.log(sub_name);

      const full_name = document.querySelector('input[id=full_name]').value;
      console.log('==============full_name==============');
      console.log(full_name);

      const LOGIN_ID = document.querySelector('input[id=sub_id2]').value;
      console.log('==============LOGIN_ID==============');
      console.log(LOGIN_ID);


         var delay = 100;
               var data = new FormData(this.form);
               data.append('folder_name', folder_name);
               data.append('sub_name', sub_name);
               data.append('full_name', full_name);
               // data.append('sub_folder', $('#sub_folder')[0].files[0]);
               data.append('LOGIN_ID', LOGIN_ID);
    

   
            $.ajax({
                url: 'addsub2_process.php',
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
   
                async: false,
                cache: false,
   
                success: function(data) {
                    setTimeout(function() {
                        $('#msgx').html(data);
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

