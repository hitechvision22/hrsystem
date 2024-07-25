<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-clipboard"></i> Mes Rapports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Mes Rapports</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-b-10">
            <div class="col-12">
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#rapportModal" class="text-white"><i class="" aria-hidden="true"></i> Ajouter un rapport</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Mes Rapports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($rapports as $rapport): ?>
                                    <tr>
                                        <td><?php echo $rapport->titre; ?></td>
                                        <td><?php echo nl2br($rapport->description); ?></td>
                                        <td><?php echo date('d-m-Y H:i', strtotime($rapport->date)); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="rapportModal" tabindex="-1" role="dialog" aria-labelledby="rapportModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo base_url('rapport/add_rapport'); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rapportModalLabel">Ajouter un rapport</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/footer'); ?>
