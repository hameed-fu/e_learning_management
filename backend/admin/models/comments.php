<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicModal-<?php echo $row['lecture_id'] ?>">Comments</button>

<div class="modal fade" id="basicModal-<?php echo $row['lecture_id'] ?>" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comments</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $id = $row['lecture_id'];
                $c_sql = "SELECT * FROM comments WHERE lecture_id = '$id'";
                $c_result = $conn->query($c_sql);
                while ($c_row = $c_result->fetch_assoc()) { ?>
                    <h5><?php echo $c_row['comments'] ?></h5>
                    <p class="text-grey"><?php echo $c_row['created_at'] ?></p>
                <?php } ?>
                <hr>
                <form action="" method="post" class="m-4">
                    <textarea name="comments" class="form-control" id="" placeholder="Comments"></textarea>
                    <input type="hidden" name="lecture_id" value="<?php echo $row['lecture_id'] ?>">
                    <input type="submit" class="btn btn-warning my-2 mx-auto" value="Add Comment" name="add_comment">
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Save changes</button>
            </div>
        </div>
    </div>
</div>