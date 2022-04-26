<?php
    include_once '../controller/EditTaskController.php'
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="../controller/EditTaskController.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>