<?php

    class TrainCar {
        // Creating TrainCar class member variables
        var $weight;

        function setWeight($weight){ $this->weight = $weight; }

        function getWeight(){ return $this->weight; }
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
                    empty($this->train_cars) ? array_push($this->train_cars, $train_car) : array_unshift($this->train_cars, $train_car);
                    return true;
                } else if (strtolower($position) == 'back') {
                    array_push($this->train_cars, $train_car);
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
                    echo "Car ".$key." : ".$value.",\n";
                }
            }
        }

        // My added method to check for the current count of train cars in the array
        function getTrainCount(){ return count($this->train_cars); }

        // Function to get the total weight of the train
        function getTrainWeight(){ echo "Train total weight : \n".array_sum($this->train_cars)."\n"; }

    }

    // Example of how to use the classes and methods

    // Step 1. Creating an object of the Train class
    $myTrain = new Train();

    // Step 2. Creating an object of the TrainCar class
    $trainCar1 = new TrainCar();
    // Step 3. Setting the weight of our new TrainCar
    $trainCar1->setWeight(30);

    // Step 4. Add the recently created TrainCar to our Train using the addTrainCar() function, and parsing the parameters - (train_car, position)
    $myTrain->addTrainCar($trainCar1->getWeight(), "front");

    // Use this step to "Remove a TrainCar from either end"
    $myTrain->removeTrainCar("front");

    // Use this to "Ask the Train how many cars are currently in the Train"
    $myTrain->getTrainCars();

    // Get the total weight of the Train
    $myTrain->getTrainWeight();

?>
