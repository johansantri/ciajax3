
<div class="container">
  
            
	<div class="row">
 
   <div class="col-md">
      <div class="col-md">
              <button type="button" style="float:right;" class="btn btn-outline-success btn-sm" title="klick here to add" data-toggle="modal" data-target="#exampleModalSub" onclick="createSubCategory()">
            <i class="fa fa-plus" aria-hidden="true">add sub</i>
            </button>
            </div>
            <div class="messages" id="messages"></div>
            &nbsp;
     <table class="table table-bordered table-striped mb-0 table-sm" id="tbsubcategory">
  <thead>
    <tr>
      <th>no</th>
      <th scope="col">nama_sub</th>
      <th scope="col">category</th>
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
    <div class="modal fade" id="exampleModalSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">form category sub</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="sub/insertSub" id="createForm">
          <div class="modal-body">
           
            <div class="form-group">
          
              
                   <label>nama sub</label>
            <input type="text" name="nama_sub" id="nama_sub" placeholder="nama category" class="form-control" autocomplete="off">
            

             <div class="form-group ">
               <label>category</label>
                  <select class="form-control kategori" name="id_category" id="id_category" value=""  aria-label="Default select example">
                <option>-</option>
               
                  
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
          <form method="post" action="sub/updateSub" id="updateForm">
          <div class="modal-body">
           
            <div class="form-group">
            <label>category</label>
            <input type="text" name="enama_sub" id="enama_sub" placeholder="entry your nama category" class="form-control" autocomplete="off">
            </div>
             <div class="form-group ">
               <label>category</label>
               <div class="eid_category" id="eid_category">
                 
               </div>
                
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

<script type="text/javascript" src="<?php echo base_url('assets/sub.js')?>"></script>