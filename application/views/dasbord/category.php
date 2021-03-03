
<div class="container">
  
            
	<div class="row">
   <div class="col-md-8">
     <div class="col-md">
              <button type="button" style="float:right;" class="btn btn-outline-success btn-sm" title="klick here to add" data-toggle="modal" data-target="#exampleModal" onclick="createCategory()">
            <i class="fa fa-plus" aria-hidden="true">add</i>
            </button>
            </div>
            <div class="messages" id="messages"></div>
            &nbsp;
     <table class="table table-bordered table-striped mb-0 table-sm" id="tbcategory">
  <thead>
    <tr>
      <th>no</th>
      <th scope="col">nama_category</th>
      <th scope="col">status_category</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
   
  </tbody>
</table>
   </div>
  
  </div>
  
</div>




<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">form category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="category/insert" id="createForm">
          <div class="modal-body">
           
            <div class="form-group">
          
              
                   <label>nama category</label>
            <input type="text" name="nama_category" id="nama_category" placeholder="nama category" class="form-control" autocomplete="off">
            

             <div class="form-group">
               <label>status category</label>
                  <select class="form-control" name="status_category" id="status_category" value="<?php echo set_value('status_category');?>"  aria-label="Default select example">
                  <option selected> </option>
                  <option value="aktif" >aktif</option>
                  <option value="tidak_aktif">tidak aktif</option>
                  </select>
             </div>
           
            </div>
             
          </div>
          <div class="modal-footer">
           
            <button type="submit" class="btn btn-outline-primary" id="submit"><i class="fa fa-save" aria-hidden="true"> Save</i> </button>
          </div>
      </form>
        </div>
      </div>
    </div>
    <!-- and modal -->


    

  <!-- Modal update -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">form category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="category/update" id="updateForm">
          <div class="modal-body">
           
            <div class="form-group">
            <label>category</label>
            <input type="text" name="enama_category" id="enama_category" placeholder="entry your nama category" class="form-control" autocomplete="off">
            </div>
             <div class="form-group">
               <label>status category</label>
                  <select class="form-control" name="estatus_category" id="estatus_category" value="<?php echo set_value('status_category');?>"  aria-label="Default select example">
                  <option selected> </option>
                  <option value="aktif" >aktif</option>
                  <option value="tidak_aktif">tidak aktif</option>
                  </select>
             </div>
          </div>
          <div class="modal-footer">
           
            <button type="submit" class="btn btn-outline-warning" id="submit"><i class="fa fa-save" aria-hidden="true"> Save</i> </button>
          </div>
      </form>
        </div>
      </div>
    </div>
    <!-- and modal -->

<script type="text/javascript" src="<?php echo base_url('assets/cat.js')?>"></script>