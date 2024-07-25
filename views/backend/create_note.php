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
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#notemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Ajouter une note</a></button>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                    <h4 class="m-b-0 text-white">Liste des notes</h4>
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
                                                    <a href="<?php echo base_url('notes/share/'.$note->id); ?>" class="btn btn-primary btn-sm">Partager</a>
                                                    <a href="<?php echo base_url('notes/stop_sharing/'.$note->id); ?>" class="btn btn-warning btn-sm">Arrêter le partage</a>
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
                        <div class="modal fade" id="notemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Ajouter une note</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" method="post" action="<?php echo base_url('notes/create'); ?>" id="btnSubmit">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title" class="control-label">Titre de la note</label>
                                                <input type="text" class="form-control" name="title" id="title" required minlength="5" maxlength="150">
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="control-label">Description</label>
                                                <textarea class="form-control" name="description" id="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Mot de passe</label>
                                                <input type="password" class="form-control" name="password" id="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="remark" class="control-label">Remarque</label>
                                                <textarea class="form-control" name="remark" id="remark"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
      </div>
<?php $this->load->view('backend/footer'); ?>
