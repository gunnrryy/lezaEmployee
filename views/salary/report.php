<?php

use yii\helpers\Html;
use fedemotta\datatables\DataTables;
//use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salaries-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?= Html::a('Create Salaries', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo $this->render('_search', ['searchModel' => $searchModel]); ?>
    
    <?php Pjax::begin(); ?>    
    <?=
    DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'id',
            'employee_id',
            'salary',
            'salary_date',
            'variation_type',
            // 'remarks',
            // 'added_on',
            // 'updated_on',
            ['class' => 'yii\grid\ActionColumn'],
            'clientOptions' => [
                "lengthMenu" => [[20, -1], [20, Yii::t('app', "All")]],
                "info" => false,
                "responsive" => true,
                "dom" => 'lfTrtip',
                "tableTools" => [
                    "aButtons" => [
                            [
                            "sExtends" => "copy",
                            "sButtonText" => Yii::t('app', "Copy to clipboard")
                        ], [
                            "sExtends" => "csv",
                            "sButtonText" => Yii::t('app', "Save to CSV")
                        ], [
                            "sExtends" => "xls",
                            "oSelectorOpts" => ["page" => 'current']
                        ], [
                            "sExtends" => "pdf",
                            "sButtonText" => Yii::t('app', "Save to PDF")
                        ], [
                            "sExtends" => "print",
                            "sButtonText" => Yii::t('app', "Print")
                        ],
                    ]
                ]
            ],
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
