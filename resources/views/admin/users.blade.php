<!-- Eyad Alsaher 230047989 && Mohamed sharif 230228898 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin - Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f4f4f7;
            color: #333;
            margin-top: 60px;
        }

        


        .container-fluid {
            margin-left: 240px;
            padding: 25px;
            margin-top: 80px;
            position: relative;
            z-index: 1;
        }

        /* User specific styles */
        .user-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 15px;
            transition: transform 0.2s;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .user-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            align-items: center;
            background-color: rgb(231, 235, 254);
            border-radius: 20px;
            padding: 5px 15px;
            width: 300px;
            transition: all 0.3s ease;
        }

        .search-bar input {
            border: none;
            background: transparent;
            outline: none;
            color: #333;
            font-size: 14px;
            width: 100%;
            padding: 5px;
        }

        .search-bar i {
            color: #1e88e5;
            margin-left: 10px;
        }

        /* Profile section */
        .icons {
            display: flex;
            align-items: center;
        }

        .icon-container {
            position: relative;
            margin-right: 15px;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #e53935;
            color: white;
            font-size: 10px;
            border-radius: 50%;
            padding: 3px 7px;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Modal styles
        .modal-body input, 
        .modal-body textarea, 
        .modal-body select {
            margin-bottom: 15px;
        } */

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .header {
                left: 0;
                width: 100%;
            }

            .container-fluid {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    
@include('include.adminheader')

@include('include.adminbar')


    <!-- Main Content -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Users Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-plus"></i> Add New User
            </button>
        </div>

        <!-- Users List -->
        <div class="row">
            <!-- Users will be dynamically added here -->
            <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                <button class="btn btn-success" data-id="{{ $user->id }}" onclick="window.location.href='{{ route('admin.users.profile', $user->id)}}'"><i class="fas fa-eye"></i></button>
                <button class="btn editUserBtn btn-warning" data-id="{{ $user->id }}"><i class="fas fa-edit"></i></button>
                <button class="btn deleteUserBtn btn-danger" data-id="{{ $user->id }}"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Bootstrap Edit Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    <input type="hidden" id="userId">
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
                <input type="hidden" id="deleteUserId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>


        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        let deleteUserId;
        // Open edit modal and fetch user data
        $('.editUserBtn').click(function() {
            let userId = $(this).data('id');
            
            $.ajax({
                url: 'users/' + userId + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#userId').val(response.id);
                    $('#userName').val(response.name);
                    $('#userEmail').val(response.email);
                    $('#editUserModal').modal('show');
                    $('.modal-backdrop').remove(); // Remove backdrop
                }
            });
        });

        // Submit form and update user
        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            
            let userId = $('#userId').val();
            let formData = {
                name: $('#userName').val(),
                email: $('#userEmail').val(),
                _token: $('input[name=_token]').val()
            };

            $.ajax({
                url: 'users/' + userId + '/update',
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert(response.success);
                    $('#editUserModal').modal('hide');
                    location.reload(); // Reload page to see updated data
                }
            });
        });
        // Open delete confirmation modal
        $('.deleteUserBtn').click(function() {
            deleteUserId = $(this).data('id'); // Get user ID from button
            $('#deleteUserModal').modal('show');
            $('.modal-backdrop').remove(); // Remove backdrop
        });

        // Confirm delete action
        $('#confirmDeleteBtn').click(function() {
            $.ajax({
                url: 'users/' + deleteUserId + '/delete', 
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.success);
                    $('#deleteUserModal').modal('hide');
                    $('.modal-backdrop').remove(); // Remove backdrop
                    $('body').removeClass('modal-open'); // Fix scrolling
                    location.reload(); // Refresh page to reflect deletion
                }
            });
        });


    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

