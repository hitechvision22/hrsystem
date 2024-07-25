<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-clipboard"></i> Rapports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Rapports</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Tous les Rapports</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Employé</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notice as $value) : ?>
                                        <tr>
                                            <td><?php echo $value->id; ?></td>
                                            <td><?php echo $value->title; ?></td>
                                            <td><?php echo nl2br(substr($value->description, 0, 100)) . (strlen($value->description) > 100 ? '...' : ''); ?></td>
                                            <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
                                            <td><?php echo date('Y-m-d', strtotime($value->date)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('backend/footer'); ?>
