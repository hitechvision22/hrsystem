<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-sticky-note"></i> Notes partagées</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Notes partagées</li>
                    </ol>
                </div>
            </div>
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                    <h4 class="m-b-0 text-white">Liste des notes partagées</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Remarque</th>
                                                <th>Créé par</th>
                                                <th>Date de création</th>
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
                                                <td><?php echo date('Y-m-d', strtotime($note->created_at)); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm view-note" data-toggle="modal" data-target="#viewNoteModal" data-id="<?php echo $note->id; ?>">Voir</a>
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
                
                <!-- Modal pour voir une note -->
                <div class="modal fade" id="viewNoteModal" tabindex="-1" role="dialog" aria-labelledby="viewNoteModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="viewNoteModalLabel">Détails de la note</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div id="noteDetails"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?>

<script>
$(document).ready(function() {
    $('.view-note').click(function() {
        var noteId = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url("notes/get_note_details/"); ?>' + noteId,
            type: 'GET',
            success: function(response) {
                $('#noteDetails').html(response);
            }
        });
    });
});
</script>
