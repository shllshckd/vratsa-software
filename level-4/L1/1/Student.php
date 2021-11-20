<?php

class Student {
    public $name;
    public $class;
    public $averageGrade;
    public $motivation;

    private function show_info(){
        echo $this->name;
        echo $this->class;
        echo $this->averageGrade;
        echo $this->motivation;
    }

    public function go_to_school() {
        return 'going to school...';
    }

    private function study($hours){
        return 'studying for ' . $hours;
    }

    private function do_homework() {
        return 'doing homework...';
    }
    
    public function do_test($subject, $grade){
        return 'Did a test on ' . $subject . ' and got ' . $grade;
    }
}