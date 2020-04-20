<?php


class Patient
{
    public $name;
    public $code;
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}

class queue
{
    public $queue;
    public $limit;
    public function __construct($array, $limit)
    {
        if (is_array($array)) {
            $this->queue = $array;
        } else {
            $this->queue = [];
        }
        if (is_integer($limit)) {
            $this->limit = $limit;
        } else {
            $this->limit = 5;
        }
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function push($patient)
    {
        $person = [
            "name" => $patient->name,
            "code" => $patient->code
        ];
        if (count($this->queue) < $this->limit) {
            array_push($this->queue, $person);
        } else {
            $this->dequeue();
            array_push($this->queue, $person);
        }
    }

    public function dequeue()
    {
        array_shift($this->queue);
    }

    public function __toString()
    {
        return implode(",", $this->queue);
        // TODO: Implement __toString() method.
    }

    public function sort(){
        usort($this->queue,function($a,$b){
           return strcmp($a['code'],$b['code']);
        });
    }

}

$patien1 = new Patient("Smith", 5);
$patien2 = new Patient("Jones", 4);
$patien3 = new Patient("Fehrenbach", 6);
$patien4 = new Patient("Brown", 1);
$patien5 = new Patient("Ingram", 1);
$queue = new queue($arr = [], 5);
$queue->push($patien1);
$queue->push($patien2);
$queue->push($patien3);
$queue->push($patien4);
$queue->push($patien5);
//$queue->push($patien6);
$queue->sort();
var_dump($queue);