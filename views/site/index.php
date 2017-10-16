<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Yash Khuthia';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Welcome to Employee Management application developed by <b>Yash Khuthia</b> powered by <b>Yii2</b>.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to("site") ?>">Let's Get started</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Employees</h2>

                <p>You can manage all the employees from this section.</p>

                <p><a class="btn btn-default" href="<?= Url::to("employee") ?>">Employees &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Salaries</h2>

                <p>Salary management section is here.</p>

                <p><a class="btn btn-default" href="<?= Url::to('salary') ?>">Salaries &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Reports</h2>

                <p>Reporting section is here.</p>

                <p><a class="btn btn-default" href="<?= Url::to("reports") ?>">Reports &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
