<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-clipboard"></i> Notes</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Notes</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10"> 
            <div class="col-12">
                <button type="button" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    <a data-toggle="modal" data-target="#noteModal" class="text-white">Add Note</a>
                </button>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Notes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display nowrap table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Remark</th>
                                        <th>Shared With</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($notes as $note): ?>
                                    <tr>
                                        <td><?php echo $note->id; ?></td>
                                        <td><?php echo $note->title; ?></td>
                                        <td><?php echo nl2br(substr($note->description, 0, 100)) . (strlen($note->description) > 100 ? '...' : ''); ?></td>
                                        <td><?php echo $note->remark; ?></td>
                                        <td><?php echo $note->first_name . ' ' . $note->last_name; ?></td>
                                        <td>
                                            <?php if($note->shared_with): ?>
                                                <a href="<?php echo base_url('notes/stop_sharing/'.$note->id); ?>" class="btn btn-danger">Stop Sharing</a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#shareModal" data-note_id="<?php echo $note->id; ?>">Share</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Note Modal -->
        <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="noteModalLabel">Add Note</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="<?php echo base_url('notes/add'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" required minlength="5" maxlength="150">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="remark">Remark</label>
                                <textarea class="form-control" name="remark"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add Note</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Share Note Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="shareModalLabel">Share Note</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form method="post" action="<?php echo base_url('notes/share'); ?>">
                        <div class="modal-body">
                            <input type="hidden" name="note_id" id="note_id">
                            <div class="form-group">
                                <label for="employee_id">Employee</label>
                                <select name="employee_id" class="form-control" required>
                                    <option value="">Select Employee</option>
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee->id; ?>"><?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Share Note</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/footer'); ?>

<script>
$('#shareModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var note_id = button.data('note_id')
    var modal = $(this)
    modal.find('.modal-body #note_id').val(note_id)
})
</script>
