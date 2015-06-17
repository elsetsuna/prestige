<html>
<head>
<script>
$(document).on( "click", '.edit_button',function() {

        var name = $(this).data('name');
        var id = $(this).data('id');
        var content = $(this).data('content');
        var quote = $(this).data('quote');

        $(".business_skill_id").val(id);
        $(".modal-body #name").val(name);
        $(".modal-body #quote").val(quote);
       tinyMCE.get('business_skill_content').setContent(content);

    });
</script>
<body>
<table class="table table-striped table-bordered" id="store-table">
                                            <thead>
                                              <tr>
                                                <th>Id</th>
                                                <th>Program Name</th>
                                                <th>Content</th>
                                                <th>Quote</th>
                                                <th>Actions</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="5%;">Angka</td>
                                                    <td style="width:15%;">fergy</td>
                                                    <td style="width:45%;">Kontent</td>
                                                    <td style="width:15%;">Quota</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-xs edit_button" 
                                                                data-toggle="modal" data-target="#myModal"
                                                                data-name="fergy"
                                                                data-content="Kontent"
                                                                data-quote="Quota"
                                                                data-id="5">
                                                                Edit
                                                        </button>
                                                        <button type="button" data-id="5" data-toggle="modal" data-target="#myModal3" class="btn btn-danger btn-xs delete_button">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
</table>
 <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Skill</h4>
      </div>
          <div class="modal-body">
          <form method="post" action="">
              <div class="form-group">
                <input type ="text"   class="form-control" name="name" id="name" placeholder="Enter Skill" required>
              </div>
              <div class="form-group">
                  <input class="form-control business_skill_content" type="hidden" name="content">
                  <label for="heading">Enter program details</label>
                  <textarea id="business_skill_content"  name="content"></textarea>
              </div>
              <div class="form-group">
                <input class="form-control business_skill_quote" name="quote" id="quote" placeholder="Enter Quote" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
      
    </div>
  </div>
    </div>  
</body>
</html>
      
