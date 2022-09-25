<?php
class FoodDescs extends Controller
{
    public function __construct()
    {
        $this->FoodDescModel = $this->model('FoodDesc');
    }

    public function index()
    {
        // Get FoodDesc
        $foodDescs = $this->FoodDescModel->getFoodDescs();

        $data = [
            'foodDescs' => $foodDescs
        ];

        $this->view('foodDescs/index', $data);
    }

    public function getFoodNutritionalElements($ndb_no)
    {
        // Get FoodNutritionElements
        $foodNutritionElements = $this->FoodDescModel->getFoodNutritionalElements($ndb_no);

        $data = [
            'ndb_no' => $ndb_no,
            'foodNutritionElements' => $foodNutritionElements
        ];

        $this->view('foodDescs/foodNutritionalElements', $data);
    }
}
