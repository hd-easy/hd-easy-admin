<?php

namespace backend\controllers;

use Yii;
use app\models\Employee;
use app\models\Employee_service;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
    public $enableCsrfValidation = false;
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
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find()->where($this->handel_search()),
            'pagination' => [
                'pagesize' => Yii::$app->params['page_size'],
            ]
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    function handel_search()
    {
        $arr = ['company_id'=>Yii::$app->user->identity->id];
        if($_REQUEST['st'])
        {
             ($_REQUEST['status'])?$arr['status']=$_REQUEST['status']:'';
             ($_REQUEST['service_type'])?$arr[Yii::$app->params['empl_type_real'][$_REQUEST['service_type']]]=1:'';
        }
        switch($_REQUEST['st'])
        {
            case 1:
                ($_REQUEST['search_input'])?$arr['name']=$_REQUEST['search_input']:'';
                break;
            case 2:
                ($_REQUEST['search_input'])?$arr['tel']=$_REQUEST['search_input']:'';
                break;
                default:
        }
        return $arr;
    }
    /**
     * Displays a single Employee model.
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
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();
        if ($model->load(Yii::$app->request->post()) && $res=$model->save()) {
            $this->set_service_info($model->id,$_REQUEST['service_data']);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'data_set'=>$this->get_service_info()
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->set_service_info($id,$_REQUEST['service_data']);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'data_set'=>$this->get_service_info($id)
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
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
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


  public function get_service_info($id=null)
  {
    foreach(Yii::$app->params['empl_type'] as $k=>$v)
    {
        if($id)
        {
            $res = Employee_service::findone(['employee_id'=>$id,'type_id'=>$k]);
            $arr[$k]['intro'] = $res->intro;
            $arr[$k]['salary']=$res->salary;
        }else
        {
            $arr[$k]['intro']='';
            $arr[$k]['salary']='';
        }
    }
      return json_encode($arr);
  }

    public function  set_service_info($id,$rawdata)
    {
        $data = json_decode($rawdata);
        Employee_service::deleteAll(['employee_id'=>$id]);
        foreach($data as $k=>$v)
        {
            if(is_null($v->intro)&&is_null($v->salary))
            {
                continue;
            }
            $res = new Employee_service();
            $res->employee_id = $id;
            $res->type_id = $k;
            $res->intro = $v->intro;
            $res->salary = $v->salary;
            $res->save();
        }
    }

}
