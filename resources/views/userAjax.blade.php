<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Ajax CRUD tutorial using Datatable</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body class="bg-dark">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title">User Management Crud 
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewUser"> Create New User</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="UserForm" name="UserForm" class="form-horizontal">
                           <input type="hidden" name="user_id" id="User_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-12">
                                <input type="email" id="email" name="email"  required="" placeholder="Enter User Email" class="form-control" >
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Role</label>
                                <div class="col-sm-12">
                                <select name="role" id="role" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                </select>
                               
                                </div>
                            </div>
                            </div>
                                
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</body>
<script type="text/javascript">
  $(function () {
     
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewUser').click(function () {
        $('#saveBtn').val("create-User");
        $('#User_id').val('');
        $('#UserForm').trigger("reset");
        $('#modelHeading').html("Create New User");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editUser', function () {
      var User_id = $(this).data('id');
      $.get("{{ route('users.index') }}" +'/' + User_id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#User_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#role').val(data.role);

      })
   });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#UserForm').serialize(),
          url: "{{ route('users.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#UserForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUser', function () {
     
        var User_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('users.store') }}"+'/'+User_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
</html>