<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
        /* Adjust margin for gutters */
    }

    .col {
        box-sizing: border-box;
        padding: 0 15px;
        /* Add gutters between columns */
        flex: 1;
        /* Equal width for each column */
    }

    /* Example styles for demonstration purposes */
    .row {
        /* background-color: #f2f2f2; */
        margin-bottom: 20px;
        padding: 10px;
    }

    .col {
        /* background-color: #dcdcdc; */
        margin-bottom: 15px;
        padding: 15px;
    }
</style>

<div class="row">
    <div class="col">
        <h2>PIMPINAN CABANG PERSATUAN ISLAM (PERSIS) PAMENGPEUK</h2>
    </div>
    <div class="col"></div>
    <div class="col">
    </div>
</div>
<div class="row">
    <div class="col">
    </div>
    <div class="col">DATA OBJEK WAKAF</div>
    <div class="col">
    </div>
</div>

<?php

$this->M_gzl->generatePDF('data_wakaf.pdf', $this->output->get_output());

?>