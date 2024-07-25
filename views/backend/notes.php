<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-sticky-note"></i> Notes</h3>
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
                <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#noteModal" class="text-white"><i class="" aria-hidden="true"></i> Ajouter une note</a></button>
            </div>
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Notes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Créé par</th>
                                        <th>Partagé avec</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($notes as $note): ?>
                                    <tr>
                                        <td><?php echo $note->id; ?></td>
                                        <td><?php echo $note->title; ?></td>
                                        <td><?php echo substr($note->description, 0, 50) . '...'; ?></td>
                                        <td><?php echo $note->creator_first_name . ' ' . $note->creator_last_name; ?></td>
                                        <td><?php echo $note->shared_first_name ? $note->shared_first_name . ' ' . $note->shared_last_name : 'Non partagé'; ?></td>
                                        <td>
                                            <?php if(!$note->is_shared): ?>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#shareModal<?php echo $note->id; ?>">Partager</button>
                                            <?php else: ?>
                                            <a href="<?php echo base_url('notes/stop_sharing/'.$note->id); ?>" class="btn btn-danger btn-sm">Arrêter le partage</a>
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

        <!-- Modal pour ajouter une note -->
        <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noteModalLabel">Ajouter une note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('notes/create'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="remark">Remarque</label>
                                <textarea class="form-control" id="remark" name="remark" rows="2"></textarea>
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

        <!-- Modal pour partager une note -->
        <?php foreach($notes as $note): ?>
        <div class="modal fade" id="shareModal<?php echo $note->id; ?>" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel<?php echo $note->id; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shareModalLabel<?php echo $note->id; ?>">Partager la note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('notes/share/'.$note->id); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="employee_id">Choisir un employé</label>
                                <select class="form-control" id="employee_id" name="employee_id" required>
                                    <option value="">Sélectionner un employé</option>
                                    <?php foreach($employees as $employee): ?>
                                    <option value="<?php echo $employee->id; ?>"><?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Partager</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
