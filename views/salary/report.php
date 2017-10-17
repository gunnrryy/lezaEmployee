<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salary Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salaries-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php echo $this->render('_search', ['searchModel' => $searchModel]); ?>
    
    <?php Pjax::begin(); ?>    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'autoXlFormat'=>true,
        'export'=>[
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
//        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            'employee.name',
            'salary',
            'salary_date',
            'variation_type',
            'remarks',
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ],
         'panel'=>[
            'type'=>'primary',
             'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset', ['report'], ['class' => 'btn btn-info']),
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
