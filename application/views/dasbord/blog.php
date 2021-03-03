<div class="container">
<div class="col-md">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" onclick="createBlog()" data-toggle="modal" data-target="#exampleModalLong">
  Add Post
</button>
</div>
&nbsp;
&nbsp;
  <div class="messages" id="messages"></div>
	<div class="col-md">
		<table class="table table-bordered table-striped mb-0 table-sm" id="tblog">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">meta</th>
      <th scope="col">category</th>
      <th scope="col">sub category</th>
      <th scope="col">create_ad</th>
    
      <th scope="col">update_ad</th>
      <th scope="col">status</th>
      <th scope="col">owner</th>
      <th scope="col">action</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
       <td>Otto</td>
      <td>@mdo</td>
       <td>Otto</td>
      <td>@mdo</td>
       <td>Otto</td>
      <td>@mdo</td>
    </tr>


  </tbody>
</table>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="blog/insert" id="createForm">
          <div class="modal-body">
           
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">

        <label>title blog</label>
        <input type="text" name="title" id="title" placeholder="title blog seo" class="form-control" autocomplete="off">

        </div>
   

          </div>
          <div class="col-md-6">
                  <div class="form-group">

        <label>meta blog</label>
        <input type="text" name="meta" id="meta" placeholder="meta blog seo" class="form-control" autocomplete="off">

        </div>
          </div>
        </div>
      
                <div class="form-group">

        <label>description blog</label>
      <textarea class="form-control" id="description" name="description"></textarea>

        </div>
      
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
               <label>category</label>
                  <select class="form-control kategori" name="id_categori" id="id_categori"   aria-label="Default select example">
                  <option value="" > - </option>
                 
                  </select>
             </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
               <label>sub category</label>
                  <select class="form-control" name="id_sub_categori" id="id_sub_categori"   aria-label="Default select example">
                  <option selected> </option>
                 
                  </select>
             </div>
              </div>
              
            </div>

               <div class="form-group">

        <label>tags blog</label>
        <input type="text" name="tags" id="tags" placeholder="tags blog seo" class="form-control" autocomplete="off">

        </div>


             
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

<!--update modal blog -->


<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="post" action="blog/update" id="updateForm">
          <div class="modal-body">
           
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">

        <label>title blog</label>
        <input type="text" name="etitle" id="etitle" placeholder="title blog seo" class="form-control" autocomplete="off">

        </div>
   

          </div>
          <div class="col-md-6">
                  <div class="form-group">

        <label>meta blog</label>
        <input type="text" name="emeta" id="emeta" placeholder="meta blog seo" class="form-control" autocomplete="off">

        </div>
          </div>
        </div>
      
                <div class="form-group">

        <label>description blog</label>
      <textarea class="form-control edescription" id="edescription" name="edescription"></textarea>

        </div>
      
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
               <label>category</label>
                <div class="all_cat" >
                 
               </div>
             </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
               <label>sub category</label>
                <div class="tes" >
                 
               </div>
             </div>
              </div>
              
            </div>

               <div class="form-group">

        <label>tags blog</label>
        <input type="text" name="etags" id="etags" placeholder="tags blog seo" class="form-control" autocomplete="off">

        </div>

        
             
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/blog.js')?>"></script>
<script>
        CKEDITOR.replace( 'description' );
         CKEDITOR.replace( 'edescription' );
</script>

