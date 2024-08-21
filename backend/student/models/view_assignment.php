<button type="button" class="btn btn-info" data-toggle="modal" data-target="#basicModal-<?php echo $row['assignment_id'] ?>">View</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="basicModal-<?php echo $row['assignment_id'] ?>" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $a_row['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>