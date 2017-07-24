<?php
namespace app\controllers;

use app\models\Categories;
use app\models\Products;
use app\models\Artists;
use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Cart;
use app\models\Orders;

class ShopController extends Controller
{
    function actionCategories(){
        $categories = Categories::find()->where("hide != 1")->all();
        $products = Products::find()->where("hide != 1");
        $pagination = new Pagination([
            "defaultPageSize" => 2,
            "totalCount" =>  $products->count(),
        ]);
        $products = $products
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render("categories", [
            "categories" => $categories,
            "products" => $products,
            "pagination" => $pagination
        ]);
    }
    function actionProduct(){
        $product = Products::find()->where(["id" => Yii::$app->request->get("id")])->one();
        
        return $this->render("product", [
            "product" => $product,
            //"image" => $imgArray[],
        ]);
    }
    public function actionArtist($id){

        if(is_numeric($id)){
            $info = Artists::find()->where(["id" => $id])->one();
            $categories = Categories::find()->where("hide != 1")->all();
            $products = Products::find()->where(["artist_id" => $id, "hide" => "0"]);
            $pagination = new Pagination([
                "defaultPageSize" => 2,
                "totalCount" =>  $products->count(),
            ]);
            $products = $products
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render("artist", [
                "products" => $products,
                "categories" => $categories,
                "info" => $info,
                "pagination" => $pagination]);
        } else {
            return $this->render('error',["name" => "404", "message" => "Страница не найдена"]);
        }
    }
    public function actionCategory($id){

        if(is_numeric($id)){
            $info = Categories::find()->where(["id" => $id])->one();
            $categories = Categories::find()->where("hide != 1")->all();
            $products = Products::find()->where(["category_id" => $id, "hide" => "0"]);
            $pagination = new Pagination([
                "defaultPageSize" => 2,
                "totalCount" =>  $products->count(),
            ]);
            $products = $products
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render("category", [
                "products" => $products,
                "categories" => $categories,
                "info" => $info,
                "pagination" => $pagination]);
        } else {
            return $this->render('error',["name" => "404", "message" => "Страница не найдена"]);
        }
    }
    public function actionAdd($id){

        if(is_numeric($id)){
            $cart = new Cart();
            if(Yii::$app->user->id) {
                $cart->user_id = Yii::$app->user->id;
                $cart->product_id = $id;
                $cart->save();
                return $this->redirect("cart");
            } else {
                return $this->goBack();
            }
        } else {
            return $this->render('error',["name" => "404", "message" => "Страница не найдена"]);
        }
    }
    public function actionCart(){
        $cart = Cart::find()->select('`products`.`title` AS `title`, `products`.`price` AS `price`,`cart`.`id` AS `cart_id`')->where(["`cart`.`user_id`" => Yii::$app->user->id])->leftJoin("products","`cart`.`product_id` = `products`.`id`")->all();
        return $this->render('cart',["cart" => $cart]);
//        $artists = new ActiveDataProvider([
//            'query' => Artists::find()->where(['hide' => 0]),
//            'pagination' => [
//                'pageSize' => 5,
//            ],
//        ]);
//        return $this->render("artists", [
//            "artists" => $artists,
//        ]);

    }
    public function actionOrders()
    {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post())) {
            $cart = Cart::find()->select('product_id')->where(["`user_id`" => Yii::$app->user->id])->all();
            $productsArray = "";
            foreach($cart as $id){
                $productsArray .= $id->product_id .",";
            }
            $model->user_id = Yii::$app->user->id;
            $model->products_array = $productsArray;
            if ($model->validate()) {
                $model->save();
                $cart = Cart::deleteAll('user_id='.Yii::$app->user->id);

                $this->redirect("thanks");

            }
        }

        return $this->render('orders', [
            'model' => $model,

        ]);
    }
    public function actionThanks()
    {

        return $this->render('thanks', [

        ]);
    }

}