<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Light green background */
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 128, 0, 0.2); /* Green shadow */
            padding: 20px;
            width: 400px;
        }
        .btn-success {
            background-color: #2e7d32 !important; /* Darker green button */
            border: none;
        }
        .btn-success:hover {
            background-color: #1b5e20 !important; /* Darker shade on hover */
        }
        .form-label {
            color: #2e7d32; /* Green label color */
        }
        a {
            color: #2e7d32;
        }
        a:hover {
            color: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-container">
            <h3 class="text-center mb-3 text-success">Register</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control border-success" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control border-success" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control border-success" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Select Role</label>
                    <select class="form-select border-success" name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Permissions</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input border-success" type="checkbox" name="permissions[]" value="can_create">
                                <label class="form-check-label">Can Create</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input border-success" type="checkbox" name="permissions[]" value="can_edit">
                                <label class="form-check-label">Can Edit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input border-success" type="checkbox" name="permissions[]" value="can_update">
                                <label class="form-check-label">Can Update</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input border-success" type="checkbox" name="permissions[]" value="can_delete">
                                <label class="form-check-label">Can Delete</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input border-success" type="checkbox" name="permissions[]" value="can_view">
                                <label class="form-check-label">Can View</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100">Register</button>
                <div class="text-center mt-3">
                    <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
