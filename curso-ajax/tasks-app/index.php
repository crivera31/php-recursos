<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Tasks App</a>
        <ul class="navbar-nav ml-auto">
            <form action="" class="form-inline my-2 my-lg-0" id="formBuscar">
                <input type="search" name="search" id="search" class="form-control mr-sm-2" placeholder="Search your task">
                <button type="submit" class="btn btn-success my-2 my-sm-0">
                    Search
                </button>
            </form>
        </ul>
    </nav>
    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="" id="taskForm">
                            <input type="hidden" id="taskId" name="taskId">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Task Name" class="form-control">
                        </div>
                        <div class="form-group">
                             <textarea name="description" id="description" cols="30" rows="10" placeholder="Task Description" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block text-center">Save task</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <ul id="container">
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nombre</td>
                            <td>Description</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="tasks">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>