<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Job;
use yii\data\Pagination;


class JobController extends Controller
{
    /** Index Page **/
    public function actionIndex()
    {
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }
    /** Create Job **/
    public function actionCreate()
    {
        $job = new Job();
        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('success', 'Job Added');

                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    /** Edit Job **/
    public function actionEdit($id)
    {
        $job = Job::findOne($id);
        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('success', 'Job Updated ');

                return $this->redirect('details?id=' . $id);
            }
        }

        return $this->render('/job/edit', ['job' => $job]);
    }

    /** Job Details **/
    public function actionDetails($id)
    {
        $job = Job::find()
            ->where(['id' => $id])
            ->one();
        return $this->render('details', ['job' => $job]);
    }

    /** Unpublished Job **/
    public function actionUnpublished()
    {
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where(['is_published' => '0'])
            ->all();

        return $this->render('unpublished', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

    /** Delete Job **/
    public function actionDelete($id)
    {
        $job = Job::findOne($id);
        $job->delete();
        Yii::$app->getSession()->setFlash('success', 'Job Deleted ');
        $query = Job::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }
}
