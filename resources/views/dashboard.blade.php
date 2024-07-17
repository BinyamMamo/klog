<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/toasts.css') }}">

    <style>
		.delete-btn {
			display: block;
			cursor: pointer;
			/* text-align: center; */
			padding-left: 0.9em;
			padding-top: 0.9em;
		}

		.delete-btn:hover {
			color: #f11c;
		}

        .avatar {
            height: 45px;
            width: 45px;
            border-radius: 50%;
        }

        #affirmModal .modal-content {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, 100%);
        }

        .password {
            max-width: 2rem !important;
        }

        .add-row {
            padding: 0;
        }

        .add-row input {
            border: none;
            width: 100%;
            height: 100%;
            display: block;
        }

        .add-row input:focus {
            border: none;
            outline: none;
        }

        .avatar-container {
            width: 5.5rem;
            position: relative;
        }

        .avatar-container * {
            margin: auto;
        }

        .thumbnail-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table .table-thumbnail {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            display: block;
            height: 45px;
            width: 50px;
            border-radius: 5px;
        }

        #affirmModal .modal-content {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, 100%);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center">User Management Dashboard</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Avatar</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @foreach ($users as $user)
                            <tr id="<%= user._id %>">
                                <td scope="row" class="ordinal">
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->password }}
                                </td>
                                <td class="thumbnail-container">
                                    <span style="background-image: url('{{ URL($user->avatar) }}');"
                                        class="table-thumbnail"></span>
                                </td>
                                <td><i data-id="{{ $user->id }}" class="fas fa-trash-alt delete-btn"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody class="add-row">
                        <tr>
                            <th scope="row">$</th>
                            <th><input type="text" name="name" placeholder="username"></th>
                            <th><input type="email" name="email" placeholder="email"></th>
                            <th><input type="password" name="password" placeholder="password"></th>
                            <th class="avatar-container">
                                <button class="btn btn-secondary"><i class="fas fa-user-circle"></i></button>
                                <input type="file" style="display: none">
                                <input type="hidden" name="avatar" value="">
                            </th>
                            <th><button class="btn btn-primary"><i class="fas fa-user-plus"></i></button></th>
                        </tr>
                    </tbody>
                    <tbody class="fake-users">
                        <tr>
                            <form id="fakeUsersForm">
                                <th scope="row">$</th>
                                <th>Generate</th>
                                <th>Fake</th>
                                <th>Users</th>
                                <th class="avatar-container">
                                    <input type="number" class="form-control" id="numberOfUsers" placeholder="🤖"
                                        min="1">
                                </th>
                                <th><button class="btn btn-warning"><i class="fas fa-user-secret"
                                            style="font-size: 1.5rem;"></i></button>
                                </th>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <br><br><br><br><br><br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
        </script>

    <script src="{{ asset('js/toasts.js') }}"></script>
    <script src="{{ asset('js/affirm.js') }}"></script>

    <script>
        $(document).ready(function () {
            console.clear();
            console.log('Hey there');
            toastSuccess("Users loaded successfully!");

            // Function to update the ordinal numbers
            function updateOrdinalNumbers() {
                $('#userTableBody tr').each(function (index) {
                    $(this).find('.ordinal').text(index + 1);
                });
            }

            // Handle fake users form submission
            $('#fakeUsersForm').submit(function (e) {
                e.preventDefault();
                const numberOfUsers = $('#numberOfUsers').val();

                let index = $('#usersTableBody tr').length + 1;
                fetch(`/fake-users/${numberOfUsers}`)
                    .then(response => response.json())
                    .then(users => {
                        users.forEach(user => {
                            $('#usersTableBody').append(`
                                <tr id="${user._id}">
                                    <th scope="row" class="ordinal">${index++}</th>
                                    <td>${user.name}</td>
                                    <td>${user.email}</td>
                                    <td>${user.password}</td>
                                    <td><img src="${user.avatar}" alt="👤" class="avatar" width="45px"></td>
                                    <td><i data-id="${user._id}" class="fas fa-trash-alt delete-btn"></i></td>
                                </tr>
                            `);
                        });
                        updateOrdinalNumbers();
                        toastSuccess(`${numberOfUsers} fake users added successfully!`);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastDanger('Failed to add fake users.');
                    });
            });

            // Handle delete button click
            $(document).on('click', '.delete-btn', function () {
                let id = this.dataset.id.toString();

                affirm('Are you sure you want to delete this user?').then((result) => {
                    if (result) {
                        console.log('Deleting user...');
                        deleteUser(id);
                    } else {
                        console.log('Deletion cancelled!');
                    }
                });
            });

            function deleteUser(id) {
                fetch('/delete', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id }),
                }).then(response => response.json())
                    .then(res => {
                        const row = document.getElementById(id);
                        if (row) {
                            let ordinal = $(row).find('.ordinal');
                            let index = parseInt(ordinal.text());

                            let next = $(row).next()[0];
                            while ($(next).is('tr')) {
                                $(next).find('.ordinal').html(`${index++}`);
                                next = $(next).next()[0];
                            }
                            console.log('User Deleted!');

                            row.parentNode.removeChild(row);
                        } else {
                            console.error(`Row with ID "${rowId}" not found.`);
                        }
                        toastSuccess(res.msg);
                    }).catch(err => {
                        console.error(err);
                        toastDanger(err.toString());
                    });
            }
        });
    </script>
</body>

</html>