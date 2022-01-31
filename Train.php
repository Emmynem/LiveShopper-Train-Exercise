<?php

    class TrainCar {
        // Creating TrainCar class member variables
        var $type;
        var $weight;
        var $new_train_car_obj;
        
        function setType($type){ $this->type = $type; }

        function getType(){ return $this->type; }

        function setWeight($weight){ $this->weight = $weight; }

        function getWeight(){ return $this->weight; }

        function setNewTrainCarObj($type, $weight) { $this->new_train_car_obj = (object) [ "type" => $type, "weight" => $weight ]; }

        function getNewTrainCarObj() { return $this->new_train_car_obj; }
    }

    class Train {
        // Creating Train class member variables
        var $limit = 30; // Train's car limit
        var $train_cars = []; // An array of all the available trains

        // Function to add a TrainCar to the Train
        function addTrainCar($train_car, $position){

            // Checking for current number of train cars available
            if($this->getTrainCount() >= $this->limit){
                return "Train car limit reached";
            }
            else {
                // Checking for the position where to place this current TrainCar
                if (strtolower($position) == 'front'){
                    // Check if the train cars array is empty so as to push the first TrainCar
                    empty($this->train_cars) ? $this->train_cars[] = (object) $train_car : array_unshift($this->train_cars, (object) $train_car);
                    return true;
                } else if (strtolower($position) == 'back') {
                    array_push($this->train_cars, (object)$train_car);
                    return true;
                } else {
                    return "Choose position !";
                }
            }
        }

        // Function to remove a TrainCar from the Train
        function removeTrainCar($position){

            // Checking for current number of train cars available
            if(empty($this->train_cars)){
                echo "Train is empty, none left to remove. ";
            }
            else {
                // Checking for the position where to remove the TrainCar
                if (strtolower($position) == 'front'){
                    array_shift($this->train_cars);
                } else if (strtolower($position) == 'back') {
                    array_pop($this->train_cars);
                } else {
                    echo "Choose position !";
                }
            }
        }

        // Function for printing how many cars that are currently in the Train
        function getTrainCars(){
            echo "Train cars : \n";
            if (empty($this->train_cars)) { echo "No train car \n"; }
            else {
                foreach($this->train_cars as $key => $value){
                    echo "Car ".$value->type." : ".$value->weight.",\n";
                }
            }
        }

        // My added method to check for the current count of train cars in the array
        function getTrainCount(){ return count($this->train_cars); }

        // Function to get the total weight of the train
        function getTrainWeight(){ echo "Train total weight : \n".array_reduce($this->train_cars, function($obj, $item) { return $obj + $item->weight; })."\n"; }

    }

    // Example of how to use the classes and methods

    // Step 1. Creating an object of the Train class
    $myTrain = new Train();

    // Step 2. Creating an object of the TrainCar class
    $trainCar1 = new TrainCar();
    $trainCar2 = new TrainCar();
    $trainCar3 = new TrainCar();
    // Step 3. Setting the weight and type of our new TrainCar
    $trainCar1->setWeight(30);
    $trainCar1->setType("cargo");
    $trainCar2->setWeight(70);
    $trainCar2->setType("engine");
    $trainCar3->setWeight(100);
    $trainCar3->setType("passenger");
    // Step 3a setting the values for our new train car object using the get methods for the type and weight
    $trainCar1->setNewTrainCarObj($trainCar1->getType(), $trainCar1->getWeight());
    $trainCar2->setNewTrainCarObj($trainCar2->getType(), $trainCar2->getWeight());
    $trainCar3->setNewTrainCarObj($trainCar3->getType(), $trainCar3->getWeight());

    // Step 4. Add the recently created TrainCar to our Train using the addTrainCar() function, and parsing the parameters - (train_car, position)
    $myTrain->addTrainCar($trainCar1->getNewTrainCarObj(), "front");
    $myTrain->addTrainCar($trainCar2->getNewTrainCarObj(), "back");
    $myTrain->addTrainCar($trainCar3->getNewTrainCarObj(), "front");

    // Use this step to "Remove a TrainCar from either end"
    $myTrain->removeTrainCar("back");

    // Use this to "Ask the Train how many cars are currently in the Train"
    $myTrain->getTrainCars();

    // Get the total weight of the Train
    $myTrain->getTrainWeight();

?>
