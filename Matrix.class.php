<?php
/**
 * Description of MatrixNxn
 *
 * @author Jefferson Patron
 */


class MatrixNxn{

    private $matrix;
    private $N;
    private $sum = 0;

    public function __construct($N){
        $this->N = $N;
        $this->matrix = array();
        $this->firstArray();
    }

    public function getMatrix(){
        return $this->matrix;
    }

    public function getVal($x, $y, $z){
        return $this->matrix[$x][$y][$z];
    }

    public function updateVal($x, $y, $z, $W){
        $this->matrix[$x][$y][$z] = $W;
    }

    public function firstArray(){
        for ($x = 0; $x <= $this->N; $x++) {
            for ($y = 0; $y <= $this->N; $y++) {
                for ($z = 0; $z <= $this->N; $z++) {
                    $this->updateVal($x, $y, $z, 0);
                }
            }
        }
    }

    public function sumArray(){
        for ($x = 0; $x <= $this->N; $x++) {
            for ($y = 0; $y <= $this->N; $y++) {
                for ($z = 0; $z <= $this->N; $z++) {
                    $this->sum = $this->sum + $this->matrix[$x][$y][$z];
                }
            }
        }
        return $this->sum;
    }

}