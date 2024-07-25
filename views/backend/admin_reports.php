<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
    <div class="message"></div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor"><i class="fa fa-clipboard"></i> Tous les Rapports</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tous les Rapports</li>
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
                            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Employé</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($reports as $report): ?>
                                    <tr>
                                        <td><?php echo $report->title; ?></td>
                                        <td><?php echo nl2br($report->description); ?></td>
                                        <td><?php echo $report->first_name . ' ' . $report->last_name; ?></td>
                                        <td><?php echo date('Y-m-d H:i', strtotime($report->date)); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('report/edit/'.$report->id); ?>" class="btn btn-primary btn-sm">Modifier</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $links; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/footer'); ?>
