<?php

namespace backend\controllers;

use Yii;
use app\models\Schedule;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PostJob;
use app\models\Employee;

/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
            'class' => AccessControl::className(),
            'rules' => [
            [
            'actions' => [],
            'allow' => true,
            'roles' => ['@'],
            ],
            ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $this->handel_search(),
            'pagination' => [
                'pagesize' => Yii::$app->params['page_size'],
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return array
     * handel search conditions
     */
    function handel_search()
    {
        $query= Schedule::find();
        switch($_REQUEST['st'])
        {
            case 1:
                ($_REQUEST['search_input'])?$arr['employee_id']=Employee::findOne(['name'=>$_REQUEST['search_input']])->id:'';   //search  employee name
                break;
            case 2:
                //($_REQUEST['search_input'])?$arr['mobile']=$_REQUEST['search_input']:'';
                ($_REQUEST['search_input']) ?$condition['mobile'] = $_REQUEST['search_input']:'';
                break;
            default:
        }
        $arr['agency_id'] = Yii::$app->user->identity->id;
        $query->where($arr);
        if($_REQUEST['st'])
        {
            //($_REQUEST['status'])?$arr['job_id']=PostJob::findOne(['job_status'=>$_REQUEST['status']])->id:'';      //search job status
            // ($_REQUEST['service_type'])?$arr['job_id']=$_REQUEST['service_type']:'';                //search service_type
            ($_REQUEST['status']) ?$condition['job_status'] = $_REQUEST['status']:'';
            ($_REQUEST['service_type']) ?$condition['service_type'] = $_REQUEST['service_type']:'';
            $res = PostJob::find()->where($condition)->all();
            if(count($res)>0)
            {
                foreach($res as $k=>$v)
                {
                    $ids[]=$v->id;
                }
               $query->andWhere(['in', 'job_id', $ids]);
            }else
            {
                $query->andWhere(['job_id'=>'-1']);
            }
        }
        return $query;
    }


    /**
     * Displays a single Schedule model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Schedule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schedule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
