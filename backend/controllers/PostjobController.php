<?php

namespace backend\controllers;

use app\models\User;
use Symfony\Component\Security\Acl\Exception\Exception;
use Yii;
use app\models\PostJob;
use app\models\Employee;
use app\models\Schedule;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostjobController implements the CRUD actions for PostJob model.
 */
class PostjobController extends Controller
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
     * Lists all PostJob models.
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
        $query =  PostJob::find();
        if($_REQUEST['st'])
        {
            ($_REQUEST['service_type'])?$arr['service_type']=$_REQUEST['service_type']:'';
        }
        switch($_REQUEST['st'])
        {
            case 1:
                ($_REQUEST['search_input'])?$arr['name']=$_REQUEST['search_input']:'';
                break;
            case 2:
                ($_REQUEST['search_input'])?$arr['mobile']=$_REQUEST['search_input']:'';
                break;
            default:
        }
        $arr['job_status']=0;
        $query->where($arr);
        $raw_district = Yii::$app->user->identity->district;
        if(strlen($raw_district)<=3)
        {
            $query->andWhere(['district'=>$raw_district]);
        }else
        {
            $dists= explode(',',$raw_district);
            $temp_arr[] = 'or';
            foreach($dists as $v)
            {
                //$query->orWhere(['district'=>$v]);
                $temp_arr[]='district="'.$v.'"';
            }
            $query->andWhere($temp_arr);
        }
        return $query;
    }

    /**
     * Displays a single PostJob model.
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
     * Creates a new PostJob model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostJob();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PostJob model.
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
     * Deletes an existing PostJob model.
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
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDetails($id)
    {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Employee::find(),
            'pagination' => [
                'pagesize' => Yii::$app->params['page_size'],
            ]
        ]);
        return $this->render('details', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionAssign($job_id,$employee_id)
    {
        $ids = explode(',',$_REQUEST[employee_id]);
        if(count($ids)>1)
        {
            foreach($ids as $v)
           {
              $res=$this->save_data($job_id,$v);
            }
        }else
         {
            $res=$this->save_data($job_id,$employee_id);
         }
         if($res)
         {
             $res = PostJob::findOne($job_id);
             $res->job_status='1';
             $res->employee_id = $_REQUEST[employee_id];
             $res->save();
             //var_dump($res->getErrors());
         }
        $this->redirect(['index']);
    }

    function save_data($job_id,$employee_id)
    {
        try
        {
            $sh = new Schedule();
            $user_id = PostJob::findOne($job_id)->user_id;
            $sh->job_id = $job_id;
            $sh->employee_id = $employee_id;
            $sh->create_time = date('Y-m-d H:i:s');
            $sh->update_time = date('Y-m-d H:i:s');
            $sh->agency_id = Yii::$app->user->identity->id;
            $sh->user_id = $user_id;
            $res = $sh->save();
            return $res;
        }catch(Exception $e)
        {
            return false;
        }

    }

    /**
     * Finds the PostJob model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostJob the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostJob::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
