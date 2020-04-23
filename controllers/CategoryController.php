<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;
use yii\data\Pagination;
use app\models\Job;

class CategoryController extends Controller
{
    /** Category Index Page **/
    public function actionIndex()
    {
        $query = Category::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $categories = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'categories' => $categories,
            'pagination' => $pagination,
        ]);
    }

    /** Category Create Page **/
    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post())) {

            if ($category->validate()) {
                $category->save();

                Yii::$app->getSession()->setFlash('success', 'Category Added');
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }

    /** Category Edit Page **/
    public function actionEdit($id)
    {
        $category = Category::findOne($id);
        if ($category->load(Yii::$app->request->post())) {
            if ($category->validate()) {
                $category->save();
                Yii::$app->getSession()->setFlash('success', 'Category Updated ');

                return $this->redirect('details?id=' . $id);
            }
        }

        return $this->render('/category/edit', ['category' => $category]);
    }

    /** Category Details Page **/
    public function actionDetails($id)
    {
        $category = Category::find()
            ->where(['id' => $id])
            ->one();
        return $this->render('details', ['category' => $category]);
    }

    /** Category Delete Page **/
    public function actionDelete($id)
    {
        $job = Job::findOne([
            'category_id' => $id
        ]);
        if (empty($job->category_id)) :
            $category = Category::findOne($id);
            $category->delete();
            Yii::$app->getSession()->setFlash('success', 'Category Deleted ');
            $query = Category::find();
            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);

            $categories = $query->orderBy('create_date DESC')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

            return $this->render('index', [
                'categories' => $categories,
                'pagination' => $pagination,
            ]);
        elseif (!empty($job)) :
            Yii::$app->getSession()->setFlash('danger', 'Cannot delete!! There are jobs listed in this category.');
            $query = Category::find();
            $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
            ]);

            $categories = $query->orderBy('create_date DESC')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('index', [
                'categories' => $categories,
                'pagination' => $pagination,
            ]);
        endif;
    }
}
